---
title: Shortcode providers
nav_groups:
  - primary
nav_sort: 10
---

Shortcodes are text-based placeholders that can be entered into a text field, to be replaced out with something else later. A good example is the default Asset shortcodes provided by Perch. To include an asset in their content, and user can enter a shortcode such as:

    [cms:asset 1234]

Shortcodes are processed by _shortcode providers_, which are registered to handle a specific set of shortcodes by an app.

### Registering a provider

Shortcodes are handled with a PHP class, which should be registered in both the `admin.php` and `runtime.php` of your app:

```php
PerchSystem::register_shortcode_provider('MyApp_ShortcodeProvider');
```

The provider class should extend `PerchShortcode_Provider`:

```php
<?php

class MyApp_ShortcodeProvider extends PerchShortcode_Provider 
{
	public $shortcodes = [];

	public function get_shortcode_replacement($Sortcode, $Tag)
	{
		return '';
	}
}

```

The public `$shortcodes` property is an array of shortcode names handled by this provider.

The `get_shortcode_replacement()` method is called whenever a shortcode handled by this provider is encountered and needs replacing.

## Example: Embedding Tweets

The Twitter app has a very simple shortcode provider for embedding Tweets using the Twitter oembed API. In its entirety, the provider looks like this:

```php
<?php

class PerchTwitter_ShortcodeProvider extends PerchShortcode_Provider
{
	public $shortcodes = ['tweet'];

	public function get_shortcode_replacement($Sortcode, $Tag)
	{
		$id = $Sortcode->arg(0);

		if (!$id) return '';

		$API = new PerchAPI(1.0, 'perch_twitter');
		$HTTP = $API->get('HTTPClient');

		$response = $HTTP->get('https://publish.twitter.com/oembed?url=https://twitter.com/Interior/status/'.$id);

		if ($response) {
			$data = json_decode($response, true);
			if (isset($data['html'])) return $data['html'];
		}

		return '';
	}
}
```

Firstly, it declares itself the handler for `tweet`, so any shortcode formatted as `[cms:tweet ... ]` will be handed to this provider to replace.

The `get_shortcode_replacement()` method reads the first argument from the shortcode, which is expected to be the Tweet ID.

    [cms:tweet 843945557659959296]

It then uses this to make a request to the Twitter API and returns the HTML for that Tweet.

### Accessing arguments

Shortcode arguments can either be anonymous values (like the ID above) which are given an index number, or they can be named `attribute=value` pairs, which are accessed by name. You can mix both.

    [cms:tweet 843945557659959296 lang=en]

In this case the ID would be accessed with `$Shortcode->arg(0)` as it's the first unnamed argument. The `lang` value would be accessed with `$Sortcode->arg('lang')`.

### Accessing the template tag

The second argument to `get_shortcode_replacement()` is an object representing the template tag. This is an instance of [XMLTag](/api/reference/xmltag/), so the tag attributes can be accessed as methods on the object.

## Example: Embedding Instagram Photos

In exactly the same way, we can create a very simple shortcode provider for embedding photos using the Instagram oembed API. In its entirety, the provider would look like this:

```php
<?php

class PerchInstagram_ShortcodeProvider extends PerchShortcode_Provider
{
	public $shortcodes = ['instagram'];

	public function get_shortcode_replacement($Sortcode, $Tag)
	{
		$id = $Sortcode->arg(0);

		$API = new PerchAPI(1.0, 'perch_instagram');
		$HTTP = $API->get('HTTPClient');

		$response = $HTTP->get('https://api.instagram.com/oembed/?url='.urlencode('http://instagr.am/p/'.$id));

		if ($response) {			
			$data = json_decode($response, true);
			if (isset($data['html'])) return $data['html'];
		}

		return '';
	}
}
```

An Instagram photo could then be embedded by its ID like so:

    [cms:instagram BTQ1omKl0DJ]

The same example becomes trivial to adapt for any oembed API, and can be built on for other types of API too.