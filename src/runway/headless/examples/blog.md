---
title: Blog Example
nav_groups:
  - primary
nav_sort: 1
---

Creating a headless view for Blog content can be very straightforward. If you've not followed the Getting Started example for getting content from a collection, do that first. This is a follow-on example.

We're going to create a view to find a blog post and its comments as two sets. The URL for our view will be 

    /api/blog/post?slug=1234-my-nice-post

Create a new PHP file at `perch/templates/api/blog/post.php`. As normal, you need to get an instance of the Headless API and create a new response.

```php
$Headless = $API->get('HeadlessAPI');
$Response = $Headless->new_response();
```

### Sourcing Blog content

This is example, we'll use a URL slug to find a single post and the comments for that post. To do that we'll need instances of both `PerchBlogPosts` and `PerchBlogComments`.

```php
$Posts    = $API->get('PerchBlogPosts');
$Comments = $API->get('PerchBlogComments');
```

### Finding the post

We'll create a new set for our post, and then query the posts to find the matching content. The set will be called `posts` - it's always best to use a plural name and to assume that a set contains multiple items, even when we expect there only to be one. It keeps things consistent.

```php
$Set = $Headless->new_set('posts');
```

The `PerchBlogPosts::query()` method takes the same arguments as `perch_blog_custom()`.

```php
$Set->add_items($Posts->query([
			'filter' => 'postSlug',
			'value'  => perch_get('slug'),
		]));
```

Then assign the set to the response:

```php
$Response->add_set($Set);
```

### Finding the comments

Next we can look for the comments. The `PerchBlogComments::query()` method takes the same arguments as `perch_blog_post_comments()` - so the first argument is a post slug, and the second is the options array.

Create a set, and the comments, and then add the set to the response:

```php
$Set = $Headless->new_set('comments');

$Set->add_items($Comments->query(perch_get('slug'), [
		'sort' => 'commentDateTime',
		'sort-order' => 'DESC',
	]));

$Response->add_set($Set);
```

And we're done, so send the response:

```php
$Response->respond();
```

## Full example

Here's the `perch/templates/api/blog/post.php` view in full:

```php
<?php

	$Headless = $API->get('HeadlessAPI');
	$Response = $Headless->new_response();
	
	$Posts    = $API->get('PerchBlogPosts');
	$Comments = $API->get('PerchBlogComments');

	// Find the post
	$Set = $Headless->new_set('posts');
	
	$Set->add_items($Posts->query([
			'filter' => 'postSlug',
			'value'  => perch_get('slug'),
		]));
	
	$Response->add_set($Set);	
		
	// Find the comments
	$Set = $Headless->new_set('comments');
	
	$Set->add_items($Comments->query(perch_get('slug'), [
			'sort' => 'commentDateTime',
			'sort-order' => 'DESC',
		]));
	
	$Response->add_set($Set);

	// Respond
	$Response->respond();
```