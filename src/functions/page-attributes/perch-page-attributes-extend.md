---
title: perch_page_attributes_extend()
nav_groups:
  - primary
---

Use the `perch_page_attributes_extend()` function to override or add to Page Attributes at runtime.

This can be useful when a page displays in different modes. For example, the same news article page might be used every time an article is displayed, but the page attributes like title, description and open graph tags might need to change.

## Parameters

| Type | Description |
|-|-|
| Array   | An array where the keys are the attribute names, values the value set. |



## Usage examples

Use `perch_page_attributes_extend()` to replace the values set for the page with the real values needed.

```php
<?php perch_page_attributes_extend(array(
    'pageTitle' => 'Why Michael Jackson was not an owl'
)); ?>
```

See how this can be used when adding [Facebook Open Graph tags and Twitter Cards](http://solutions.grabaperch.com/integrations/facebook-and-twitter-sharing) to a page.
