---
title: perch_category()
nav_groups:
  - primary
---

The `perch_category()` function displays a single category when passed a category path.

## Parameters

| Type | Description |
|-|-|
| Path    | String, the path to the category you want to display |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of a template to use to display the content.|
|skip-template|True or false. Bypass template processing and return the content in an associative array.|
|return-html|True or false. For use with `skip-template`. Adds the HTML onto the end of the returned array with key `html`.|
|split-items|True or false. Return an array of individually templated items.|
|raw|True or false. Returns unprocessed content, for use alongside skip-template.|


## Usage examples

The below example will output the category identified by the path `colours/blue`.

```php
<?php perch_category('colours/blue') ?>
```
