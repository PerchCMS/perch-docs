---
title: Rewrite rules
nav_groups:
  - primary
---

Perch Runway uses your web server's URL rewriting capability to manage incoming page requests. This needs to be configured in order for Runway to serve pages and the URLs you choose.

Different types of web servers need configuring differently. Follow the instructions below for the type of web server you're running. If your web server isn't listed, there's a general set of instructions at the bottom.

## Apache with mod_rewrite

For Apache with mod_rewrite, add the following rules to your web server configuration.

Ideally this will form part of your server's virtualhost configuration. If you can't access the server config, a workaround is to use a simple `.htaccess` file in the root of the website. This isn't as good for performance, but is convenient in development and staging environments.

When installing fresh:

```html
    # Perch Runway
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/perch
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule .* /perch/core/runway/start.php [L]
```

Or when **upgrading a Perch 2 site** containing existing pages:

```html
    # Perch Runway
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/perch
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule .* /perch/core/runway/start.php [L]
```

If you installed into a folder other than `/perch`, update the rules accordingly.

## Nginx  

If you're using nginx, add the following to your server configuration.

```php
    # Match just the homepage
    location = / {
        try_files $uri @runway;
    }

    # Match any other request
    location / {
        try_files $uri $uri/ @runway;
    }

    # Perch Runway
    location @runway {
        rewrite ^ /perch/core/runway/start.php last;
    }
```

If you installed into a folder other than `/perch`, update the rules accordingly.

## Something else

If you're using a server other than those listed above, you need to configure rewriting to do the following:

1. Ideally, ignore the `/perch` folder
2. If the requested file doesn't exist, route the request to `/perch/core/runway/start.php`
