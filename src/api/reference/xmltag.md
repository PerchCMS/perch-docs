---
title: PerchXMLTag
nav_groups:
  - primary
nav_sort: 99
---

The `PerchXMLTag` class parses an XML tag as a string into a object that can be more usefully worked with.

```php
$Tag = new PerchXMLTag('<perch:content id="heading" type="text" label="Give it a title">');
```

The attributes can then be accessed as properties:

```php
echo $Tag->id;  	// heading
echo $Tag->type;	// text
echo $Tag->label; 	// Give it a title
```

## Methods

There are a number of available methods

### get_attributes

Get the attributes as an array.

```php
print_r($Tag->get_attributes());
```

### get_data_attribute_string()

This returns a string of all the `data-` attributes from the tag, ideal for passing straight through in a templating scenario.

```php
echo $Tag->get_data_attribute_string();
```

### set

Attributes can also be set:

```php
set($key=null, $val=false)
```

This enables you to manipulate a tag before passing it on.

### is_set

Test if an attribute has been set:

```php
if ($Tag->is_set('id')) {
	// id has been set
}
```

### tag_name

Get the name of the tag

```php
echo $Tag->tag_name(); // perch:content
```

### search_attributes_for

If you need to find attributes that begin with a certain prefix, you can do that with `search_attributes_for`

```php
print_r($Tag->search_attributes_for('aria-'));
```

## Creating tags

As well as parsing a string to an object, you can do the reverse. `PerchXMLTag` can be used staticly to programatically generate a tag.

```php
echo PerchXMLTag::create('img', 'single', [
			'src' => 'dog.jpg',
			'width' => '640',
			'height' => '480',
		]);
```

The arguments are:

1. Name of tag
2. Type of tag - one of `opening`, `closing` or `single`
3. An array of attributes
