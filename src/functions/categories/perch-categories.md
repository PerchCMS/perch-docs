---
title: perch_categories()
nav_groups:
  - primary
---

The `perch_categories()` function displays a listing of your categories.

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|set|The slug of a category set to narrow the output to|
|template|The name of a template to use to display the content.|
|sort|The ID of the field to sort on.|
|sort-order|Either `ASC` (ascending), `DESC` (descending) or `RAND` (random).|
|sort-type|Either `alpha` or `numeric`. Default is `alpha`.|
|count|The number of items to display.|
|start|The item number to start displaying from.|
|filter|The ID of a field to filter the results by.|
|match|Used with filter, see the below table for values|
|value|Used with filter and match. The value to match. For `between` and `in`, takes a comma delimited string. For `regex` takes PCRE regular expression.|
|skip-template|True or false. Bypass template processing and return the content in an associative array.|
|return-html|True or false. For use with `skip-template`. Adds the HTML onto the end of the returned array with key `html`.|
|split-items|True or false. Return an array of individually templated items.|
|raw|True or false. Returns unprocessed content, for use alongside skip-template.|

*Note:* currently categories can only be filtered by standard fields, and not by custom fields.

## Usage examples

```php
perch_categories([
	'set' => 'my-category-set',
]);
```