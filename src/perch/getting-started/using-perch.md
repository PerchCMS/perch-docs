---
title: Using Perch - getting started tutorial
nav_groups:
  - primary
---



Pre-requisites:

- You have installed Perch and are now ready to start editing content.
- You have a page with a `.php` extension on the same level as the `perch` folder (just like the `example.php` in your download)

## 5 minutes to content management

1. Add Perch to a page
2. Add a Perch Region to the page
3. Reload the page in your browser
4. Select a template
5. Edit your content

### 1. Add Perch to a page

Take your PHP page and add the following line of PHP as the very first thing in the document - above the `<!doctype html>`.

```
<?php include('perch/runtime.php'); ?>
```

This statement includes a path from the page to the **Perch runtime** file. If you renamed the `perch` folder, you need to change the folder name in this path too.

### 2. Add a Perch Region to the page

Find an area of content on your page that you would like to make editable. Delete the content and replace it with the following PHP function.

```
<?php perch_content('Intro'); ?>
```

This is a PHP tag with a single function inside `perch_content()`, pass into this function the name of the Region. This should be something you use to identify it in the Perch Control Panel. So if we want to edit the introductory text on a page, the name 'Intro' would make sense.

### 3. Reload the page in your browser

Hit reload. This will cause Perch to "see" the new Region you have added. If you now View Source you should not see either of the PHP tags we have added, and in the place of your Region you will see an HTML comment indicating that this region is undefined.

### 4. Select a template

To define the Region we need to choose a template. Log into the Perch Control Panel and you should see your page listed, with the Region identified as "New".

Click on this Region and select a template. For now we will use one of the pre-defined templates included with Perch so choose Text Block and submit the form.

### 5. Edit your content

You can then add some content and save it. Return to the page in your site, reload the page and the content will display.

You are now managing content with Perch! There is much more you can do with Perch, but if you have got this far you know that everything is working as it should. The rest of this document explains more details about the steps we have just taken.

## Additional details and Troubleshooting

### The path to the Perch Runtime include

In step 1 we added the Perch Runtime to the page. Any page that uses Perch functionality needs this file included. In this simple example the `perch` folder was at the same level as our file however just like a path to an image in HTML, this needs to be adjusted depending on where the page lives in your site.

For example, if the page in question is `/about/history.php `the path would need to be adjusted to move up out of the about folder like so:

```
<?php include('../perch/runtime.php'); ?>
```

PHP includes cannot be root relative (starting with a `/`) in the way that images or CSS files can. On most servers however, you can make the include path relative to the site root by using the `DOCUMENT_ROOT` server variable. This means that you don't need to adjust the path between pages.

```
<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
```

### Perch on .html pages

The simplest way to use Perch is for your pages to have a `.php` extension. However you can usually instruct your webserver to parse PHP in files with a `.html` extension or any other extension that you like. See the page Using other file extensions for more details.

### Removing file extensions

Perch does not have inbuilt routing as it is designed to be added to existing pages, and to run on servers even if they do not have the ability to rewrite URLs. However you can use your `.htaccess` file to remove file extensions or rewrite URLs in any way you like. [Read more about URL Rewriting and Perch](/perch/getting-started/file-extensions/).

### If your region does not show up in the Control Panel

View Source on the page where you added the Perch Region and check that you cannot see any PHP tags. If you can see PHP tags then this page is not running PHP. This is more common if you are trying to use extensions other than `.php` so a good test is to try a `.php` page to isolate the issue.

### Perch Templates

In this walkthrough we chose the Text Block template. This is a predefined template that uses Markdown formatting. However this is just an example. You can define your own templates with anything from a single field like this one through to many fields to create complex structured data.
