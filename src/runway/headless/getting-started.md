---
title: Getting Started
nav_groups:
  - primary
nav_sort: 1
---

By default, Runway serves your headless views from `/api`. This routes to the `perch/templates/api` folder, where you create a PHP file for any headless view you wish to make available.

## Example

Create a new PHP file as `perch/templates/api/news.php`. This will be a headless view that we'll configure to access a collection called News. (The file name is not significant, just convenient.)

Once complete, we'll be able to access our new headless view at the URL:

    /api/news

In this file, open some `<?php` tags and create a new instance of the Headless API.

```php
<?php
	$Headless   = $API->get('HeadlessAPI');
```

### The Response

Creating a headless view is all about building up the _response_. We find all the content we want to include, add it to the response, and then at the very end we call `respond()` and the result is sent to the client.

So to get started, create a new response:

```php
$Response   = $Headless->new_response();
```

### Sourcing the content

For this example, we're going to query some items from the News collection. To do that, we need to get an instance of `ContentCollections` and find our collection by name.

```php
$Collections = $API->get('ContentCollections');
$Collection  = $Collections->find('News');
```

We now have an instance of the News collection quick we can query for content. More on that in a moment.

### Sets

Each response is made up of one or more content sets. In a simple view like this one, there might just be one set containing our news items. On a more complex view, there could be multiple. For example, a blog post view might have a set containing the post, one containing the comments, and another containing related posts.

It's the ability to put multiple sets into a response that give the opportunity to build views that contain all the content you need for fetching with a single HTTP request. Of course, you don't _have_ to put multiple sets into a response, but the fact that you _can_ offers lots of flexibility.

When you create a set, you give it a name to identify it in the response. We'll call this one `news`:

```php
$Set = $Headless->new_set('news');
```

We then need to call the `add_items()` method on the set to pass in our content. We could do something like this:

```php
$Set->add_items([
	[
		'id' => 1,
		'title' => 'Hello',
	],
	[
		'id' => 2,
		'title' => 'World',
	],
]);
```

More realisically, that content needs to come form the CMS somewhere. It's here that we're going to query the News collection to get our items. To do that, we use the `query()` method, and pass it the same options we'd use for `perch_collection()`.

```php
$Set->add_items($Collection->query([
			'sort' => 'date',
			'sort-order' => 'DESC',
		]));
```

Now that the set has items, we can add it to the response.

```php
$Response->add_set($Set);
```

### Sending the response

We're all done, so send the response to the client:

```php
$Response->respond();
```

## Full example

Here's the `perch/templates/api/news.php` view in full:

```php
<?php
    $Headless   = $API->get('HeadlessAPI');
	$Response   = $Headless->new_response();

	$Collections = $API->get('ContentCollections');
	$Collection  = $Collections->find('News');

	$Set = $Headless->new_set('news');

	$Set->add_items($Collection->query([
			'sort' => 'date',
			'sort-order' => 'DESC',
		]));

	$Response->add_set($Set);

	$Response->respond();
```
