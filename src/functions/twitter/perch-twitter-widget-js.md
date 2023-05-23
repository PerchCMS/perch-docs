---
title: perch_twitter_widget_js()
addon: perch_twitter
nav_groups:
  - primary
---

Outputs a `<script>` tag linking to the Twitter widget JavaScript.

By default, tweets are output as a basic semantic HTML resprentation. To turn them into a rich embedded tweet with media and actions, you need to include Twitter's widget JavaScript once per page. This can be done in the `<head>` of the page, before the closing `</body>` tag, or just inline as needed.

```php
<?php 
  perch_twitter_get_latest(); 
  perch_twitter_widget_js();
?>
```