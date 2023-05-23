---
title: if
nav_groups:
  - primary
---

The `<perch:if></perch:if>` conditional tag can be used to only include a section of the template if a value has been set for one of the fields.

The following code example uses perch:if to check that content has been entered for the heading and only outputs the markup if it has.

```html
<perch:if exists="heading">
    <h2>
        <perch:content id="heading" type="text" label="Heading" required="false">
    </h2>
</perch:if>
```

The following attributes can be used with perch:if:

### perch:if attributes

|Attribute|Description|
|-|-|
|exists|The `id` of a content item to check for the existence of any value (i.e. not empty).|
|not-exists|The same as `exists` but with the reverse outcome.|
|id|The id of a content item to check against a specific value.|
|value|The string to compare against the content in the item with the given ID. If the value is wrapped in {braces} it is evaluated as a content ID rather than a literal string.|
|match|The type of comparison to use when comparing the content of field id to string given in the value attribute. Defaults to eq (equal to) see below for other values|
|different|The id of a content item to compare with the value of the previous item, when outputting multiple items. Can be used with format.|
|format|Used with different or ID comparisons, to format the value (e.g. to use a month from a date field) before comparison. Value as per format attribute on content tags.|
|format-both|true or false. Used with format, to format both the value AND the value of the ID field in order to make a like-for-like comparison.|
|case|Used with different or ID comparisons. Set to insensitive to make the comparison case insensitive.|

### Values for the match attribute

{{> table_values_for_match }}

## Testing for multiple values

The `exists` and `not-exists` attributes can test multiple values, separated by `AND`, `OR` and `XOR` keywords. For example, check to see if the field with an id of name OR the field with an id of title has been completed:

```html
<perch:if exists="name OR title"></perch:if>
```

Check to see that the field with an id of price AND the field with an id of on_sale have been completed:

```html
<perch:if exists="price AND on_sale"></perch:if>
```

These can also be combined:

```html
<perch:if exists="price AND on_sale OR is_download"></perch:if>
```

The logic string is processed left-to-right, so the above would be processed as:

```php
(price AND on_sale) OR is_download
```

You can control the sequence using brackets:

```html
<perch:if exists="price AND (on_sale OR is_download)"></perch:if>
```

The result of any value can also be flipped with the `!` not operator. The following would test for `price` _and not_ `on_sale`:

```html
<perch:if exists="price AND !on_sale"></perch:if>
```

## Examples

As well as hiding the markup around a field when a field is not used, conditional tags can have other uses. For example, you can use a checkbox to turn parts of a template on and off:

```html
<perch:content type="checkbox" id="sale" value="1" label="Sale in progress" suppress>
<perch:if exists="sale">
        <div class="promo">Sale now on!</div>
</perch:if>
```

Or check content for specific values:

```html
<perch:if id="text" value="Hello">
    The value of field 'text' is 'Hello'
</perch:if>

<perch:if id="age" value="18" match="gt">
    The value of field 'age' is greater than 18.
</perch:if>
```

The `value` attribute can also be dynamic – comparing one content value against another. To do this, wrap the value in {braces}.

```html
<perch:if id="price" match="lt" value="{list_price}">
    <strong>Fantastic reduction!</strong>
</perch:if>
```

The `different` attribute is used when outputting multiple items. It compares the current value of the specified field with the same field in the previous item. If they’re not the same, the condition is true. If the are the same, the else is used.

The following would output the category, only if it’s different from the previous category.

```html
<perch:if different="category">
    <h2><perch:content id="category" type="text"></h2>
</perch:if>
```

The [format](/docs/attributes/format/) attribute can be used to prepare a value before comparing it. This is particularly useful for dates.

The following would output the name of the month, only if the month is different from the previous entry. (`F` is the formatting code to display the full month name.)

```html
<perch:if different="date" format="F">
    <h2><perch:content id="date" type="date" format="F"></h2>
</perch:if>
```
