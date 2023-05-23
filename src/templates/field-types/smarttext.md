---
title: Smarttext
nav_groups:
  - primary
---

The `smarttext` field type provides a single-line text field, but the output is processed to translate plain text punctuation characters into “smart” typographic punctuation.

This makes it particularly suited to text like headings.

```html
<perch:content id="heading" type="smarttext" label="Heading" required>
```

The following changes are made:

-   Straight quotes `"` and `'` are turned into “curly” quotes
-   Dashes `--` and `---` are turned into en- and em-dashes
-   Three consecutive dots `...` are turned into an ellipsis

Unlike a regular textarea processed with Textile or Markdown, the content isn’t wrapped in block-level paragraphs – only punctuation is changed.

By default, unicode characters are used. If you’re not serving your pages as UTF-8, you may wish to use HTML entities instead. This can be done with the following setting in your `perch/config/config.php` file:

```php
define('PERCH_HTML_ENTITIES', true);
```
