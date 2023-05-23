---
title: perch_form_reponses()
nav_groups:
  - primary
---

The `perch_form_reponses()` function is a method of showing responses of a form basedon specific form field value.

If you have the Forms App installed then you can directly get the form responses using this function.

## Requires

The Forms App installed.

## Parameters

| Type | Description |
|-|-|
| formID | form id that uniquely identifies the form|
| by_field | a form field id |
| value | the value that your responses will be filtered  |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The name of an HTML template file in the templates/comments folder.|


## Usage examples

Outputs the responses for the form with ID identified as `4`  which have the name field equal with value Tom

```php

   perch_form_reponses(4,array(
                      'by_field'=>'name',
                       'value'=>'Tom'
                       ));

```

Pass in an alternate template.

```php

   perch_form_reponses(4,array(
                    template => 'my_template.html',
                      'by_field'=>'name',
                       'value'=>'Tom'
                       ));

 
```


