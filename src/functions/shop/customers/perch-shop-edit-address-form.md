---
title: perch_shop_edit_address_form()
addon: perch_shop
nav_groups:
  - primary
---

Display an edit form for one of the customer's addresses with `perch_shop_edit_address_form()`.

## Requires

- Perch Shop installed

## Parameters

| Type | Description |
|-|-|
| Integer | The ID of the address to edit (or `false`). Must belong to the logged in customer. |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|A custom template for the form|

## Usage examples

To display a form for capturing a new address. The default template is `shop/addresses/edit.html`.

```php
perch_shop_edit_address_form();
```

To edit an existing address, pass in the address ID (which you can get from the listing)

```php
perch_shop_edit_address_form(1234);
```

This function accepts an array of options to control what is returned. It can be used as follows.

```php
perch_shop_edit_address_form(1234, [
    'template' => 'edit.html',
]);
```
