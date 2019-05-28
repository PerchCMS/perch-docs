---
title: Managing Resources
nav_groups:
  - primary
---

Files and images that are uploaded by content editors into Perch are known as *resources*. They are stored on the server (not in the database) until no longer needed.

By default, resources are stored in the `perch/resources` folder. You can change for new installations in the `perch/config/config.php` file.

The two configuration options are `PERCH_RESFILEPATH` (the file system path to your folder) and `PERCH_RESPATH` (the web path to the folder from the root of your site). The standard Perch setup creates the following configuration:

```php
define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
```

It uses a bunch of other configuration constants to figure out the paths for your site, but this could be updated using basic paths:

```php
define('PERCH_RESFILEPATH', '/var/www/mysite/public_html/files');
define('PERCH_RESPATH', '/files');
```

The default resource folder must part of your website, so its files can be directly accessed by a URL.

## Resource clean-up

When resources are no longer needed, they are deleted from the server. This happens when an item is deleted, or one resource is replaced with another.

However, Perch maintains an undo history, and so resource clean-up isn’t immediate. This means that you can delete an item that uses an image, for example, and still undo that change. A resource is only deleted once the action that removed it is no longer undoable. By default, the undo history saves 30 steps, so a file will only be deleted after 30 edits.

(A bug with Perch 2.0.x meant that resource use wasn’t correctly logged. This means Perch was unable to clean up those resources. Any resources left around from that time period will need to be cleared up manually – we couldn’t find a safe way to go back without risking data loss. This was fixed in Perch 2.1.)
