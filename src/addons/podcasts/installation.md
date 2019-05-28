---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the Podcasts app checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download where you will find two folders.

-   `podcasts` – which contains example pages
-   `perch_podcasts` – which is the actual app

Copy the `perch_podcasts` folder into `perch/addons/apps/`

Add `perch_podcasts` [to your apps.php file](/docs/installing-perch/installing-apps/).

When you next log into the Perch admin the Podcasts install script will run behind the scenes to create the necessary tables. A new navigation item will appear in the apps menu.

## URL rewriting

The tracking functionality is implemented using URL rewriting, and the `podcasts` folder includes an `.htaccess` file with Apache mod_rewrite rules in it. This is to facilitate the tracking URL ending in the correct file extension for publishing via iTunes.

If you don’t have mod_rewrite or other URL rewriting available on your server, you’ll need to find an alternative method of achieving the same.
