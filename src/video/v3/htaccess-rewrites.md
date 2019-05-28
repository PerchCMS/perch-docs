---
layout: video_youtube.html
nav_groups:
  - primary
title: "Rewriting URLs with htaccess"
video_id: 4-eBgrQW2Yo
collection: video_blog
video_order: 23
duration: "6:05"
desc: Easily rewrite URLs in any way you'd like. 
---

Perch doesn't assume a lot about your web server. One of the things we don't do by default is rewrite all of the URLs of your website. This is for a couple of reasons. It means you can easily add Perch to just a few pages of an existing site, or use it to edit bits of some other app. It also means that if you find yourself working on a site with no ability to rewrite URLs, you can still use Perch.

That said, you can easily rewrite URLs in any way you'd like. This information is very much for Perch. Perch Runway does rewrite your URLs because it works with a front controller and therefore has its own routing system. So, if you are using Runway, take a look at the routing documentation.

## The .htaccess file

You add all of these rules into a file named `.htaccess` saved into the root of your site. This file must be named exactly like this, with the `.` making it a hidden file, and with no extension.

## Removing the file extension

One thing you might want to do is hide the extension. Instead of visiting `about/history.php`, you could visit `about/history` with no `.php` on the end. To do this add the following rules to your `.htaccess` file. These rules will take any incoming URL with no extension and add `.php` when sending the request to the server. Your visitors won't need the file extension but the server will see the file as if it did have an extension.

```php
RewriteEngine on
# Redirect to PHP if it exists.
# e.g. example.com/foo will display the contents of example.com/foo.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}.php -f 
RewriteRule ^(.+)$ $1.php [L,QSA]
```

In Perch you can then update your navigation to show the links without the `.php`. To do this add the option `'hide-extensions' => true` when outputting your navigation using `perch_pages_navigation()`.

```php
<?php 
  perch_pages_navigation([
    'from-path' => '/about',
    'levels' => 1,
		'hide-extensions' => true
  ]);
?>
```

## Rewriting Blog URLs

We can also rewrite blog URLs. When creating the blog we used querystrings to load our pages. For example:

`https://example.com/blog/post.php?s=2017-04-27-my-blog-post`

A rewritten URL might look like this:

`https://example.com/blog/2017-04-27-my-blog-post`

As with the pages, the server still 'sees' a querystring. Your visitors however use that much nicer looking URL.

Once again, we add this to our `.htaccess` file after the lines that allow you to link to pages without the file extension.

```php
RewriteRule ^blog/([a-zA-Z0-9-/]+)$ /blog/post.php?s=$1 [L]
```

Once you have done this be sure to go to Settings in the Control Panel and also update the Blog Post path to represent your new URL format.

## More blog URLs

You can do more than rewrite the basic URLs. The following rules may help with the various pages within the blog.

### Category Archives

```php
RewriteRule ^blog/category/([a-zA-Z0-9-/]+)/page/([0-9]+)/{0,1}$ /blog/archive.php?cat=$1&page=$2 [L]
RewriteRule ^blog/category/([a-zA-Z0-9-/]+)$ /blog/archive.php?cat=$1 [L]
```

### Date archive by year

```php
RewriteRule ^blog/date/([a-zA-Z0-9-/]+)/page/([0-9]+)/{0,1}$ /blog/archive.php?year=$1&page=$2 [L]
RewriteRule ^blog/date/([a-zA-Z0-9-/]+)$ /blog/archive.php?year=$1 [L]
```

### Tag archive

```php
RewriteRule ^blog/tag/([a-zA-Z0-9-/]+)/page/([0-9]+)/{0,1}$ /blog/archive.php?tag=$1&page=$2 [L]
RewriteRule ^blog/tag/([a-zA-Z0-9-/]+)$ /blog/archive.php?tag=$1 [L] 
```

### Post preview

```php
RewriteRule ^blog/([a-zA-Z0-9-/]+)/preview$ /blog/post.php?s=$1&preview=all [L]
```

If you're doing a lot of this, for lots of different types of pages then that may well be a good indication that you should consider upgrading the site to Runway. It handles these rewrites in a far simpler way right from within the control panel. However for simple rewriting you should be able to get to where you need to be in your `.htaccess`.

