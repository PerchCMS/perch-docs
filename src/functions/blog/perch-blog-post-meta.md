---
title: perch_blog_post_meta()
addon: perch_blog
nav_groups:
  - primary
---

Output a post title and meta tags for the `<head>` of your post detail page using `perch_blog_post_meta()`.

By default, this uses the `blog/meta_head.html` template. It will output your Facebook Open Graph and Twitter Card meta tags for when a link to your blog post is posted to Facebook or Twitter.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| ID or Slug | the ID or slug of your post |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
{{> blog_standard }}

## Usage examples

The first argument to the function is the ID or slug of your post. In a typical set-up this might be `perch_get('s')` to get the value of `s` from the URL.

```php
<head>
<?php perch_blog_post_meta(perch_get('s')); ?>
</head>
```

### Using as part of a layout

Often, you'll want to use one layout file to output the head of your pages for both blog pages and for normal pages too. Your layout file might include somthing like this:

```php
<head>
<title><?php perch_pages_title(); ?></title>
</head>
```

But when you're on a blog post detail page, you might want this instead:

```php
<head>
<?php perch_blog_post_meta(perch_get('s')); ?>
</head>
```

The way to set this up is to use a layout variable to switch between the two modes. Change your layout to do this:

```php
<head>
<?php
	if (perch_layout_has('blog-post')) {
		perch_blog_post_meta(perch_get('s'));
	}else{
		echo '<title>' . perch_pages_title(true) . '</title>';
	}
?>
</head>
```

So the layout will now do one thing if `blog-post` is set, and another if not. The final piece of the jigsaw is to set the `blog-post` layout variable when we include the layout from the blog post detail page only.

```php
<?php
	perch_layout('global.header', array(
	    'blog-post' => true
	));
?>
```
