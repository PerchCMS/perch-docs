---
title: Template handlers
nav_groups:
  - primary
nav_sort: 6
---

Perch has a flexible tag-based templating language which can be augmented with custom tags. Template handlers can hook into each phase of template parsing to add custom functionality to templates. Template handlers are implemented with an app.

A template handler is a PHP class that enxtends the `PerchAPI_TemplateHandler` base class. It specifies a mask for the tags it handles, and then a method to be called for each phase of parsing.

## When to use

You don't need to use a template handler for basic content substitution - Perch will handle that for you. The case whereby you need a template handler is if you have tags that need to do something out of the ordinary. Examples would be

1. Rendering tag pairs - that is a block with opening a closing tags that loops around the contents.
2. Rendering tags outside the scope of your own app - handling a tag no matter if it appears in a blog template, a content template or wherever.

Regular use - just substituting content within your own app - does not need a custom template handler. Perch will take care of that as standard.

## Registering your template handler

In your app's `runtime.php` and `admin.php` files, register the name of your template handler class with:

```php
PerchSystem::register_template_handler('MyApp_Template');
```

When templates are parsed, the `MyApp_Template` class will be instantiated, so make sure the file is either included or handled by your apps autoloader.

## The template handler class

By convension, your template handler should be within your app's folder and named `MyApp_Template.class.php`, according to your app's naming scheme. This is not a technical limitation - if for some reason you needed multiple handlers, you can name them and register them as needed.

A boilerplate template handler class might look like the following. 

```php
class MyApp_Template extends PerchAPI_TemplateHandler
{
	public $tag_mask = 'students|student';

	public function render($vars, $html, PerchTemplate $Template)
	{
		return $html
	}

	public function render_runtime($html, PerchTemplate $Template)
	{
		return $html;
	}

}
```

## Tag mask

The handler specifies a _tag mask_ to signify which tags this handler is to be used for. The tags name are pipe-delimited. This is example, our templater hander declares the mask `'students|student'` to work with `perch:student` tags:

```markup
<perch:student ...>
```

and also `perch:students` tags:

```markup
<perch:students></perch:students>
```

The tag mask is crucial to specify - without it the template engine won't know about your tags and so they'll get stripped out of the final output.

## Phases of parsing

The template engine has two distinct parsing phases. The primary phase deals with the majority of substitutions and is considered deterministic. The given input will always result in the same output, and that output can be cached and used again freely.

The second phase is what we call _runtime_ parsing, and is always performed at runtime, even if the previous phase has been cached. Runtime parsing is used when the result is dependant on environmental factors such as user input or session state. 

Form tags are always parsed at runtime, as the state changes based on user input - at one load it might show an empty field, and a second load might display a validation message, for example. The Members app also renders exclusively during the runtime phase, as the results will be different depending on whether the user is currently logged in or not.

The primary parsing phase uses the `render()` method, and the runtime phase uses `render_runtime()`. Which to use depends on when you need your tags to be parsed. Keep in mind that while all tags could be parsed at runtime, to do so surrenders any opertunity for caching, so don't be lazy, try to pick the best phase for each use case.

## Rendering your tags

Templates are tag-based, and are passed to both render methods as a chunk of code featuring a mix of (typically) HTML and other template tags. Some of those tags might be yours and some might not. Your job is to find your tags, process them and return the resulting code. Each handler is called in turn until all the tags are processed.

Internally, Perch parses the code for tags using regular expressions. Fear not, you don't have to do this yourself - we have all sorts of built-in functionality to do it for you.

### Be light

An important principal to remember is that your handler will be called many times during the rendering of a page. Sometimes it will have work to do and sometimes not. A simple, light string check for the presence of your tag before you start can save you doing any unnecessary processing.

```php
if (strpos($html, 'perch:student') !== false) {
	// our tag exists
}
return $html;
```
This can make additional template handlers very inexpensive to include, adding minimal overhead when not needed.

### Replacing a single tag

If you want to replace a single tag using your own content, you can do that using the passed in `$Template` instance:

```php
$my_content = ['first_name'=>'Joe'];
$html = $Template->replace_content_tags('student', $my_content, $html);
```

### Replacing a tag pair

A tag pair (opening and closing tag with something inbetween) is used in Perch templates when you need to loop around a section of the template. Parsing them requires a bit more work. Take our example tag:

```markup
<perch:students>
    <li>
    	<perch:student id="first_name">
    </li>
</perch:students>
```

Here we want to findn the `perch:students` tags so that we can loop around our set of students and write out their names.

```php
$tag_type          = 'students';
$empty_opening_tag = true;
$index_in_group    = null;
$callback          = 'render_students';

$html = $this->parse_paired_tags($tag_type, $empty_opening_tag, $html, $vars, $index_in_group, $callback)
```

- `$tag_type` is the name of the tag we're looking for - `students`.
- `$empty_opening_tag` is an optimisation based on whether the opening tag of the pair has attributes or not. Our tag does not have attributes, so this is set to `true`.
- `$index_in_group` can be used with a tag pair needs to know its position within a set. We don't need that, so it's set to `null`. 
- `$callback` is the name of a method within our handler class that will be called with the result when the tag pair is found. It's the callback that does the work.

The callback method might look like this:

```php
private function render_students($type, $opening_tag, $tag_contents, $exact_match, $html, $vars, $index_in_group=false)
{
	$replacement = 'The modified result';

	return str_replace($exact_match, $replacement, $html);
}
```

The difficult bit is what happens in between.

### Working with a tag

In the callback method, one of the arguments passed is the opening tag of our tag pair. It's handed to us as a string. If we wanted to examine it to look at its attributes, we can turn it into a `PerchXMLTag` like so:

```php
$Tag = new PerchXMLTag($opening_tag);
```

You can find out more about `PerchXMLTag` in [its reference section](/reference/xmltag).

### Subtemplating

In order to loop through the matched contents, the simplest way to deal with it is to treat it as a subtemplate. Load up a new instance of the template engine, and load the contents in as a string.

If `$vars['students']` contained an array of the content we wanted to template:

```php
$ItemTemplate = $API->get('Template');
$ItemTemplate->set_from_string($tag_contents, 'student');
$replacement = $ItemTemplate->render_group($vars['students'], true);
```


