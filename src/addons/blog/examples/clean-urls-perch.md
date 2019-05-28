---
title: Clean URLs in Perch
products: perch
nav_groups:
  - primary
---

For Runway see the Runway configuration documentation under Routing.

As Perch runs on lots of different types of web server, the default examples don’t require any sort of URL rewriting to work. That’s fine, but if you do have URL rewriting available (such as mod_rewrite on Apache) it’s often desirable to clean up the URLs.

These instructions show you how to do that using mod\_rewrite for Apache servers. SitePoint also has a great [mod_rewrite guide](http://www.sitepoint.com/guide-url-rewriting/) which may be useful to read if you’re new to URL rewriting.

## Create an .htaccess file

If you don’t have one, create a file with the name `.htaccess` (staring with a dot, and no file extension) at the top level of your site. File names that begin with a dot are usually hidden, so you may need to enable your software’s setting to show hidden files.

Add the following to your file

```php
<IfModule mod_rewrite.c>  
    RewriteEngine on  
    # rules go here
</IfModule>
```

Next, we going to add a series of rules to match incoming URLs and remap them to our real file paths. These will go at the point in the file I’ve marked `# rules go here`.

## Rewriting post URLs

If you’re using our example pages, you post detail page will have a URL like this:

```php
/blog/post.php?s=2012-10-01-my-post-title
```

But perhaps we’d rather have a URL like this:

```php
/blog/2012-10-01-my-post-title
```

To do so, add the following rule to your file

```php
RewriteRule ^blog/([a-zA-Z0-9-/]+)$ /blog/post.php?s=$1 [L]
```

Save the file and your post should now be accessible from the new URL. You now need to update your site to make sure that the links point to this new URL.

On the Settings page in Perch, find “Blog post page path” in the Blog section. Set its value to:

```php
/blog/{postSlug}
```

If using the Sections functionality, you might want to include the section slug

```php
/{sectionSlug}/{postSlug}
```

Now, wherever you use `<perch:blog id="postURL">` in your templates, the new URL will be used.

### Preview URLs

Once URLs are rewritten, draft post preview is achieved by adding `/preview` to the end of your URL, so remember to add a rule for that. You should rewrite it to add the query string argument `preview=all` to the URL.
