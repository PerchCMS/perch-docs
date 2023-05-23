---
title: Template
nav_groups:
  - primary
nav_sort: 99
---

The Template class takes a template file and some data variables and merges them to create your final output.

```php
$Template = $API->get('Template');
```

## Methods

The PerchAPI_Template class exposes a number of methods.

### PerchAPI_Template::set(string $file, string $namespace)

Sets the template file to use, and the tag namespace.

The template file is looked for first within the perch/templates folder, and then within the app’s own `perch/addons/apps/my_app/templates` folder. This enables apps to create default templates which users can then override by placing files of the same name within the common templates folder.

The tag namespace dictates the type of template tags to parse from. Set this to e.g. foo and the template class will parse tags. You should try and set this to match context, picking a namespace that fits with your app.

```php
$Template->set('blog/posts/detail.html', 'blog');
```

### PerchAPI_Template::render(array $data)

Takes an associative array of content and merges it into the current template, returning the result.

```php
$data = array();
$data['thingTitle'] = "My Title";
$data['thingDescription'] = "My Description";
echo $Template->render($data);
```

### PerchAPI_Template::render_group(array $data [, boolean $implode])

Takes an array of associative arrays of content and merges it into the current template, returning the result. By default returns an array of results, setting \implode to true returns a single string.

```php
$data = array();
$tmp = array();
$tmp['thingTitle'] = "My Title";
$tmp['thingDescription'] = "My Description";
$data[] = $tmp;

$tmp = array();
$tmp['thingTitle'] = "My Title 2";
$tmp['thingDesription'] = "My Description 2";
$data[] = $tmp;

echo $Template->render_group($data, true);
```