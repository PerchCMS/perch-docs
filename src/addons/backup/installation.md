---
title: Installation
nav_groups:
  - primary
---

Download the app checking that your installation of Perch is equal to or greater than the minimum version listed.

Unzip the download and copy the perch_backup folder into

`/perch/addons/apps/`

As this is an admin only app there is no runtime to include.

The app will then show up in the admin menu as Backup.

Inside the `perch_backup folder` is a folder named backup. Give this folder the same write permissions as your Perch resources folder. Perch Backup needs to be able to read and write to this directory.

## Settings

Perch Backup will add two settings to the Settings page in Perch. One is to hide backup from Editor users, the other to set your path to mysqldump (the MySQL utility for backing up a database) if it is not the default mysqldump.

MAMP users on the Mac for example may find their path is:

`/Applications/MAMP/Library/bin/mysqldump`

To gain the full functionality of backup you need to be able to run mysqldump. This is a MySQL utility that creates a copy (or ‘dump’) of your database structure and content.

Ask your host whether it is possible to run mysqldump from PHP and what the path to it is.
