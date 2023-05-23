---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the Poll app checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download where you will find two folders.

-   `poll` – which contains example page
-   `perch_podll` – which is the actual app

Copy the `perch_poll` folder into `perch/addons/apps/`

Add `perch_poll` [to your apps.php file](/docs/installing-perch/installing-apps/).

When you next log into the Perch admin the Poll install script will run behind the scenes to create the necessary tables. A new navigation item will appear in the apps menu.

## URL rewriting

The tracking functionality is implemented using URL rewriting, and the `podcasts` folder includes an `.htaccess` file with Apache mod_rewrite rules in it. This is to facilitate the tracking URL ending in the correct file extension for publishing via iTunes.

If you don’t have mod_rewrite or other URL rewriting available on your server, you’ll need to find an alternative method of achieving the same.
