---
layout: video_youtube.html
nav_groups:
  - primary
title: "Simple URL Rewriting"
video_id: P9G6hSbZbAM
---
## Video Transcript

Perch doesn’t assume a lot about your web server, one of the things we don’t do by default is rewrite all of the URLs of your site. This is for a couple of reasons. It means that you can add Perch to an existing site without changing any URLs, it also means that if you are on a server without mod_rewrite Perch will still work.

That said you can easily rewrite URLs in any way you would like. A common thing people like to do, and something we will do with our Swift website is hide the extension, so instead of visiting contact.php you would visit /contact.

Your server needs to have mod_rewrite enabled to do this.

To do this create a file called .htaccess in the site root or open one if it is already there.

Add the following:

```unix
    # Redirect to PHP if it exists.
    # e.g. example.com/foo will display the contents of example.com/foo.php
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME}.php -f 
    RewriteRule ^(.+)$ $1.php [L,QSA]
```

You now need to update any Navigation to output links without the .php on the end, in our case this is the about section navigation which we can find on about/index.php and also the Master Page template perch/templates/pages/about.php

Add an option of 'hide-extensions' => true to the array.

You should also update any hardcoded navigation such as the top Nav.

To rewrite blog URLs to remove the query string we can add the following line to our file:

```unix
    RewriteRule ^blog/([a-zA-Z0-9-/]+)$ /blog/post.php?s=$1 [L]
```

Save the file and your post should now be accessible from the new URL. You now need to update your site to make sure that the links point to this new URL.

On the Settings page in Perch, find ‘Blog post page path’ in the Blog section. Set its value to:
/blog/{postSlug}

Now, wherever you use `<perch:blog id="postURL">` in your templates, the new URL will be used.

Some additional rules I have added are as follows:

```unix
    RewriteRule ^blog/([a-zA-Z0-9-/]+)/preview$ /blog/post.php?s=$1&preview=all [L]
```

This rewrites the preview URL so that post preview will work once you have rewritten URLs.

```unix
    RewriteRule ^blog/category/([a-zA-Z0-9-/]+)/page/([0-9]+)/{0,1}$ /blog/archive.php?cat=$1&page=$2 [L]
    RewriteRule ^blog/category/([a-zA-Z0-9-/]+)$ /blog/archive.php?cat=$1 [L]

    RewriteRule ^blog/date/([a-zA-Z0-9-/]+)/page/([0-9]+)/{0,1}$ /blog/archive.php?year=$1&page=$2 [L]
    RewriteRule ^blog/date/([a-zA-Z0-9-/]+)$ /blog/archive.php?year=$1 [L]

    RewriteRule ^blog/tag/([a-zA-Z0-9-/]+)/page/([0-9]+)/{0,1}$ /blog/archive.php?tag=$1&page=$2 [L]
    RewriteRule ^blog/tag/([a-zA-Z0-9-/]+)$ /blog/archive.php?tag=$1 [L]
```

These rewrite category, date and tag archives.

If you rewrite URLs that are used in your templates, for example the category URLs, don’t forget to go and update the links to these.
