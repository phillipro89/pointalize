<?php
/**
 * Plugin Name:       Pointalize FAQ Markup
 * Plugin URI: https://pointalize.com/
 * Description:       Automatically generates FAQPage JSON-LD from <details class="faq-item">…</details> in post/page content (answers output as plain text).
 * Version:           1.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            Pointalize
 * Author URI:        https://pointalize.com/about/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Pointalize_FAQ_Markup
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Extract Q&A pairs from <details class="faq-item"> blocks within an HTML string.
 *
 * Rules:
 * - Question = text inside <summary>
 * - Answer   = text inside <div class="faq-content"> if present, else first <p>
 * - All HTML in answers is stripped → plain text only for clean schema.
 *
 * @param string $html Raw post content (may contain HTML).
 * @return array[] Schema-ready items for FAQPage->mainEntity (each: Question with acceptedAnswer).
 */
function pointalize_faq_extract( $html ) {
    $faqs = [];
    if ( ! $html || stripos( $html, '<details' ) === false ) return $faqs;

    // Match all <details class="faq-item">...</details>
    if ( ! preg_match_all('/<details[^>]*class="[^"]*\\bfaq-item\\b[^"]*"[^>]*>(.*?)<\\/details>/is', $html, $items) ) {
        return $faqs;
    }

    foreach ( $items[1] as $block ) {
        // Question from <summary>
        if ( ! preg_match('/<summary[^>]*>(.*?)<\\/summary>/is', $block, $qm) ) continue;
        $q = trim( wp_strip_all_tags( $qm[1] ) );
        if ( $q === '' ) continue;

        // Answer: prefer .faq-content, else first <p>
        $answer_html = '';
        if ( preg_match('/<div[^>]*class="[^"]*\\bfaq-content\\b[^"]*"[^>]*>(.*?)<\\/div>/is', $block, $am) ) {
            $answer_html = trim( $am[1] );
        } elseif ( preg_match('/<p[^>]*>(.*?)<\\/p>/is', $block, $pm) ) {
            $answer_html = trim( $pm[1] );
        }
        if ( $answer_html === '' ) continue;

        // ---- Strip ALL HTML to plain text ----
        // Remove shortcodes (e.g., [shortcode]).
        $answer_plain = strip_shortcodes( $answer_html );
        // Strip tags, decode entities (so &amp; -> &), normalize whitespace.
        $answer_plain = wp_strip_all_tags( $answer_plain, true );
        $answer_plain = html_entity_decode( $answer_plain, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
        // Collapse multiple spaces/newlines to single spaces.
        $answer_plain = preg_replace( '/\s+/u', ' ', $answer_plain );
        $answer_plain = trim( $answer_plain );

        if ( $answer_plain === '' ) continue;

        $faqs[] = [
            '@type' => 'Question',
            'name'  => $q,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $answer_plain, // plain text only
            ],
        ];
    }

    return $faqs;
}

/**
 * Print FAQPage JSON-LD into <head> on singular front-end views.
 *
 * Guards:
 * - Skip in admin, feeds, previews, password-protected posts.
 * - Only emit when at least one FAQ found.
 */
add_action('wp_head', function(){
    if ( ! is_singular() ) return;           // only single posts/pages/CPT
    if ( is_admin() || is_feed() ) return;   // skip admin screens and feeds

    $post = get_post();
    if ( ! $post ) return;

    $faqs = pointalize_faq_extract( $post->post_content );
    if ( empty($faqs) ) return;

    $graph = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $faqs,
    ];

    echo '<script type="application/ld+json">'
       . wp_json_encode( $graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
       . '</script>' . "\n";
}, 20);
