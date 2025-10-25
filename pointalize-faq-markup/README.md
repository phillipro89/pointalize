# Pointalize FAQ Markup

Automatically adds **FAQPage JSON-LD structured data** to WordPress posts and pages — helping your content qualify for **Google Rich Results**.

[![License: GPL v2 or later](https://img.shields.io/badge/License-GPL%20v2%2B-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![Built by Pointalize](https://img.shields.io/badge/Built%20by-Pointalize-blue)](https://pointalize.com)

---

## Description

**Pointalize FAQ Markup** automatically generates valid [FAQPage JSON-LD](https://developers.google.com/search/docs/appearance/structured-data/faqpage) markup from simple HTML `<details>` blocks in your WordPress posts and pages.

No Gutenberg blocks, no shortcodes, no settings — just clean, automatic schema generation for better visibility in Google Search.

---

## Features

- Detects all `<details>` blocks and extracts questions and answers automatically.
- Outputs valid **FAQPage JSON-LD** markup directly in the page `<head>`  
- Works on posts, pages, and custom post types  
- Converts answers to plain text for maximum schema compatibility  
- Zero dependencies, zero bloat — pure PHP  

---

## Example Usage

In the WordPress block editor, simply add a “Details” block from the block inserter, type your question into the Summary field, and your answer into a paragraph below it — the plugin will automatically detect these blocks and generate valid FAQPage schema for Google Rich Results.

Or add the following manually to your post or page:

```html
<details>
  <summary>How do I enable FAQ markup?</summary>
  <p>Simply install and activate the plugin. It automatically detects your FAQ blocks.</p>
</details>

<details>
  <summary>Does it work on pages too?</summary>
  <p>Yes, it supports posts, pages, and custom post types out of the box.</p>
</details>
```

When viewed, valid JSON-LD will automatically appear in your HTML `<head>` — ready for Google's Rich Results.

---

## Installation

**Option 1 – Install from the WordPress Plugin Browser**
1. Go to **Plugins → Add New**
2. Search for “Pointalize FAQ Markup”
3. Click **Install Now**, then **Activate**

**Option 2 – Upload manually**
1. Download the ZIP file (`pointalize-faq-markup.zip`)
2. In your WordPress dashboard, go to **Plugins → Add New → Upload Plugin**
3. Select the ZIP and click **Install Now**
4. Activate the plugin

After activation, the plugin will automatically detect any `<details>` blocks and generate the corresponding JSON-LD markup.

---

## FAQ

**Do I need to configure anything?**  
No. The plugin works automatically on any post or page containing `<details>` elements.

**Can I use HTML inside my answers?**  
Yes, but all HTML is stripped before generating JSON-LD. Only plain text is used to ensure compliance with Google’s guidelines.

**Does it work with page builders?**  
Yes, as long as the rendered HTML includes `<details>` and `<summary>` tags.

**Is it SEO-safe?**  
Absolutely. It outputs valid, minimal JSON-LD following [Google’s FAQPage guidelines](https://developers.google.com/search/docs/appearance/structured-data/faqpage).

---

## Compatibility

- WordPress **5.0+**
- PHP **7.4+**
- Works with all major themes and editors

---

## Changelog

### 1.0
- Initial release
### 1.1
- Simplified even more by removing the faq-item class dependency.
### 1.2
- Added better documentation on how to use the plugin.

---

## Screenshot

1. Adding an FAQ in the WordPress editor using a native “Details” block.
2. Validation in Google’s Rich Results Test showing the generated FAQPage JSON-LD.

---

## Author

Developed by **Phillip Rosenheinrich**  
Founder of [Pointalize](https://pointalize.com)

---

## License

This plugin is licensed under the [GPLv2 or later License](https://www.gnu.org/licenses/gpl-2.0.html).
