---
title: Development and Workflow Tips
nav_groups:
  - primary
---

Perch has been designed to fit in with your workflow and site structure rather than dictate how you build websites. Perch installations range from the very simple with just a few Regions made editable to larger content driven websites. We have a few suggestions that can make working with Perch easier - these are mostly just good development practices rather than anything Perch specific.

## Avoid developing directly on the live server

It is straightforward to set up a local PHP development environment on your own computer, and there are a range of ways you can do so.

- More information about local PHP and MySQL installs
- How to move a Perch site

## Keep your site root the same across all environments

If the Perch folder will live at `/perch`, so right inside the root of your site when you make the site live then you should also develop and stage with the folder in that location. The aim of development and staging environments is that they mirror you live environment as closely as possible. Moving the site root around means you will have to do more work on going live rather than just deploying your files and database.

For your local setup find out how to create virtualhosts, as this will allow you to run lots of different sites on your computer for testing all with their own site root. When staging, point a subdomain to the temporary hosting. Again, keeping root in the same place, rather than putting the new site into a subfolder.

## Paths to images and CSS

When using layouts and Master Page templates you will want to reference your CSS, JavaScript and any images or pages not managed by Perch from the root of the site. For example rather than:

```html
<link href="../css/styles.css" rel="stylesheet">
```

Use the forward slash right at the start of the path. This makes the path root relative and the link will be correct no matter where you are in the structure.

```html
<link href="/css/styles.css" rel="stylesheet">
```

Again this relies on you not developing in such a way that you do not move your site root around.

It is worth noting that you cannot reference PHP includes in this way. They either need to be referenced in a way that is relative to the page they are on, or using the full directory path on the server. You can get that directory path in PHP with `$_SERVER['DOCUMENT_ROOT']`.

```html
<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
```

## Keep Perch and Add-ons up to date

We work very hard to make sure that updates do not break anything. In almost all cases an update will involve replacing the Perch `core` folder or the main addon folder, any database updates will be performed when you log into the Control Panel. If there is anything else it will be detailed in the update notes. We would certainly suggest updating to the latest version any time you work on the site.

Having an up to date Perch and addons is a requirement if you are requesting support. We tend to fix issues that come to light very quickly and ship an update, your issue may well already be fixed. Even if you are requesting implementation assistance rather than having a problem our advice will be based on the latest version of the software.

## Avoid editing perch/core or anything in an add-on folder

In order to keep Perch updateable it is vital that you do not modify anything in the core Perch folder or in an addon folder. This includes the templates shipped with an add-on. In order to modify templates for an add-on copy them into your perch/templates folder.

Perch has an API so if you need to add your own functionality this is the way to do that.

If we are aware that you are modifying the core software we will be unable to offer support to you, as we are no longer supporting our software.
