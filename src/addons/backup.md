---
title: Backup App
layout: section.html
products: perch
nav_groups:
  - primary
---

The Backup App enables a simple backup of files and resources from your site.

**This App is Perch only. Perch Runway has built-in comprehensive backup functionality, including scheduled backups**.

## Requirements

To backup your database you need to be able to run `mysqldump` from PHP. Ask your host if you are able to run `mysqldump` from PHP and if so what the path to it is.

To backup large numbers of resources you will need to have enough available memory on your server.

## Templates and functions

This App only appears in the Control Panel to enable the creation of a backup. It adds no additional functions or template tags for use on your site.

## Limitations

The Backup app cannot be used for scheduled backups as it simply creates a zip and gives it to you to download, via the browser. If you have a large site that needs regular scheduled backups from Perch then we would suggest taking a look at upgrading to Perch Runway, which can backup your site to Dropbox or other cloud storage.
