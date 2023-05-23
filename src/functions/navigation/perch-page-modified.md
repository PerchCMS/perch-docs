---
title: perch_page_modified()
nav_groups:
  - primary
---

Output the date the page was last updated with the `perch_page_modified()` function.

## Parameters

| Type | Description |
|-|-|
| Array | Options array to include a `format` key.|

```php
perch_page_modified();
```

Takes an options array with a `format` option, using [strftime](http://php.net/strftime) formatting codes.

```php
perch_page_modified(array(
    'format' => '%d %B %Y, %H:%M',
));
```
