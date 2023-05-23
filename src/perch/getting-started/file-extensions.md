---
title: Using different file extensions
nav_groups:
  - primary
---

Perch uses PHP to deliver your content, so by default the pages of your site must be `.php` files.

However, if your hosting account allows for `.htaccess` (web server configuration) files, it’s possible to tell the web server to run PHP in other sorts of pages.

To do this, create a new file at the top level of your website and call it `htaccess.txt` (we’ll rename it shortly).

The configuration settings needed for this vary from host to host, but here are some common ones. You may need to check your host's documentation or knowledgebase on how to do this. Try one, and if it doesn't work, try the next.

---

### Option 1: AddType

Put the following line into the file:

```
AddType application/x-httpd-php .php .htm .html
```


### Options 2: AddHandler

Put the following line into the file:

```
AddHandler php-script .html
```

---

You can add any file extensions you’d like to treat as PHP. (Don’t add other server-side scripting languages like `.asp` unless you know what you’re doing!)

Once you’ve done that, **rename your file to `.htaccess`** – that’s starting with a dot and no file extension. This is a hidden file, so depending on your software settings, it may then appear to vanish. Most web editing software has a setting to show hidden files.

The files with the extensions you listed should now be run as PHP, enabling Perch to manage your content.

You can also use this method to parse a `.xml` or `.json` file or other text format as PHP if you want to use Perch to create those files.

If you make a mistake in the `.htaccess` file or this is not supported by your host you may get an error, or a zero-length document, or your `.html` pages will just ignore it.

### Troubleshooting steps

1. If your site is now throwing an error then you have either made a mistake in your `.htaccess` file or your host does not support this. Search on your hosting company website for *AddType* and see if they have an alternate syntax to use, or raise a ticket with your host for help. You could send them the link to this support page.

2. If your site is not erroring but Perch does not seem to be picking up your regions, **View Source**. If you can see the Perch runtime include at the top of the page then PHP is **not** being parsed. This include should not be visible if everything is set up correctly.

3.  Check that you have copied the line exactly with no extra characters into a plain text or code editor.

4.  Check that you have renamed the file correctly as `.htaccess` and placed it in the root of your site.

5.  If your host gets back to you with information that you do not understand, raise a ticket with us giving us details of what your host has said.
