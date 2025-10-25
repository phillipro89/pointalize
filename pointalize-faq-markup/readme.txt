=== Pointalize FAQ Markup ===
Contributors: pointalize
Tags: schema, json-ld, structured data, rich results, seo
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically adds FAQPage JSON-LD markup to WordPress posts and pages for Google Rich Results.

== Description ==

Pointalize FAQ Markup automatically adds valid **FAQPage JSON-LD structured data** to your WordPress posts and pages — helping your content qualify for Google’s rich FAQ results.

Simply add collapsible FAQ sections using standard HTML `<details>` blocks, and the plugin will detect them automatically, generate the required JSON-LD markup, and inject it into your page’s `<head>` — no Gutenberg blocks, shortcodes, or extra settings required.

**Main Features:**
* Detects all `<details>` blocks and extracts questions and answers automatically.
* Outputs valid FAQPage JSON-LD schema for Google Rich Results  
* Works on posts, pages, and custom post types  
* Converts answers to plain text for maximum schema compatibility  
* No dependencies, no UI, zero bloat — pure PHP simplicity  

All output is generated automatically, following [Google’s official FAQPage guidelines](https://developers.google.com/search/docs/appearance/structured-data/faqpage).  

= Features =

* Detects all `<details>` blocks and extracts questions and answers automatically.
* Outputs valid FAQPage JSON-LD schema for Google Rich Results  
* Works on posts, pages, and custom post types  
* Converts answers to plain text for maximum schema compatibility    
* No dependencies, no UI, zero bloat — pure PHP simplicity  

= Example Usage =

In the WordPress block editor, simply add a “Details” block from the block inserter, type your question into the Summary field, and your answer into a paragraph below it — the plugin will automatically detect these blocks and generate valid FAQPage schema for Google Rich Results.

Or add the following manually to your post or page:

<details>
  <summary>How do I enable FAQ markup?</summary>
  <p>Simply install and activate the plugin. It automatically detects your FAQ blocks.</p>
</details>

<details>
  <summary>Does it work on pages too?</summary>
  <p>Yes, it supports posts, pages, and custom post types out of the box.</p>
</details>

When the page is viewed, valid JSON-LD will automatically be output in the `<head>` of your HTML, ready for Google’s rich results.

== Installation ==

You can install **Pointalize FAQ Markup** in two simple ways:

= Option 1 — Install directly from WordPress: =
1. Go to **Plugins → Add New**
2. Search for “Pointalize FAQ Markup”
3. Click **Install Now**, then **Activate**

= Option 2 — Upload the ZIP manually: =
1. Download the plugin ZIP file (`pointalize-faq-markup.zip`)
2. In your WordPress dashboard, go to **Plugins → Add New → Upload Plugin**
3. Choose the ZIP file and click **Install Now**
4. Activate the plugin

After activation, the plugin will automatically detect any `<details>` blocks in your content and output the corresponding FAQ schema.

== Frequently Asked Questions ==

= Do I need to configure anything? =
No. The plugin works automatically on any post or page containing `<details>` elements.

= Can I use HTML inside my answers? =
Yes, but all HTML will be stripped out before creating the JSON-LD markup. Only plain text is used to ensure compliance with Google’s structured data policies.

= Does it work with page builders? =
Yes, as long as the final rendered HTML includes `<details>` and `<summary>` tags. It works best with classic or block editors that output clean HTML.

= Is it safe for SEO? =
Absolutely. It outputs valid, minimal JSON-LD and follows [Google’s FAQPage guidelines](https://developers.google.com/search/docs/appearance/structured-data/faqpage).

== Compatibility ==

* WordPress 5.0 or higher  
* PHP 7.4 or higher  
* Works with all themes and content editors

== Changelog ==

= 1.0 =
* Initial release
= 1.1 =
* Simplified even more by removing the faq-item class dependency.
= 1.2 =
* Added better documentation on how to use the plugin.

== Screenshots ==

1. Adding an FAQ in the WordPress editor using a native “Details” block.
2. Validation in Google’s Rich Results Test showing the generated FAQPage JSON-LD.

== Author ==

Developed by [Phillip Rosenheinrich](https://pointalize.com)

== License ==

This plugin is licensed under the GPLv2 or later license.
