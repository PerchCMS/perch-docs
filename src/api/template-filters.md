---
title: Template filters
nav_groups:
  - primary
nav_sort: 6
---

Template functionality can be extended with the use of filters. A filter takes the value of a field and processes it in some way. Multiple filters can be applied to the same field, and they're processed in order.

```markup
<perch:content id="heading" type="text" filter="reverse">
``` 

In this example, the value of the heading field is passed to the "reverse" filter. The content will then be templated using the result from that filter.

## Enabling template filters

To save unecessary disk acccess, template filters are not enabled by default. To enable them on a site, set the `PERCH_TEMPLATE_FILTERS` config option.

```php
define('PERCH_TEMPLATE_FILTERS', true);
```

## Installing a filter

Perch looks for template filters in the `addons/templates/filters.php` file. Filters need to be either declared in this file, or declared elsewhere and included here.

## Creating a filter

A filter is a PHP class that extends the `PerchTemplateFilter` class. There are two methods you can define

- `filterBeforeProcessing`
- `filterAfterProcessing`

The _processing_ here refers to the processing that the template engine performs on the string. Examples would be the application of the `format` attribute. If your filter needs to hook in before that processing, you'd add your logic to `filterBeforeProcessing`. If it can happen after, use `filterAfterProcessing`. You can use both if needed.

Our example `reverse` filter would declare a class named `PerchTemplateFilter_reverse` that extends `PerchTemplateFilter`.

```php
class PerchTemplateFilter_reverse extends PerchTemplateFilter 
{
	public function filterAfterProcessing($value, $valueIsMarkup = false)
	{
		return strrev($value);
	}
}
```

Both methods are passed the current value of the field, and a boolean to indicate if the incoming value is HTML markup. This can be the case for something like a WYSIWYG field.

### Registering the filter

Once a filter has been declared, it can then be registered for use by the template engine. To register a filter, call `register_template_filter` passing in the name for your filter and the name of its class. 

```php
PerchSystem::register_template_filter('reverse', 'PerchTemplateFilter_reverse');
```

The filter cannot be used until it is registered.

### Returning markup

If your filter processes the value in such a way that it then needs to be treated as markup you can indicate that by setting the `$returns_markup` class property to `true`.

```php
class PerchTemplateFilter_htmlify extends PerchTemplateFilter 
{
	public $returns_markup = true;

	/* ... */
}
```

Perch will then know to treat the return value as markup with respect to how it is encoded and passed to subsequent filters.

### Accessing the template tag

A filter has access to the template tag from which it was called. This makes it simple for a filter to make use of custom attributes on the tag, and to inspect existing attributes to modify its behaviour. The template tag is available as `$this->Tag`.

```php
if ($this->Tag->type == 'select') {
	/* ... */
} 
```

### Accessing content

Similarly, a filter has access to the other content fields from the same template. This is available as `$this->content`.

```php
if (isset($this->content['heading'])) {
	/* ... */
}
```