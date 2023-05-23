---
title: Installation
nav_groups:
  - primary
---
The Events with Booking Slots app requires a little more configuration and set-up than some of our simpler add-ons.  Events app uses Members to handle user accounts. All four apps are included in your download.

## Installation and Initial Setup

Follow these steps to get started with your booking events slots. The order is important, so please take a moment to follow the steps with extra care.

### Installation

**Make sure  Perch Runway is up to date**. Events with Booking slots is a very new App and likely to receive rapid updates which will also rely on an updated Perch Core.

#### Step 1. Add the Events Files {#files}

Unzip the add-on and copy items in `addons/apps` to your `perch/addons/apps` folder. If you already have Members installed, the version you have downloaded is the latest and you should update to this if running an older version.

#### Step 2. Edit your `apps.php` config file {#appsconfig}

Download the latest version of the Events App checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download where you will find two folders.

-   events – which contains example pages
-   perch_events – which is the actual app

Copy the perch_events folder into perch/addons/apps/

Add `perch_events` [to your apps.php file](/perch/getting-started/installing/apps).

Edit your `perch/config/apps.php` file to include an entry for `perch_members` and `perch_events`. The entry for `perch_members` should be *before* the entry for `perch_events`. For example:

```php
<?php
    $apps_list = array(
        'content',
        'categories',
        'perch_blog',
        'perch_members',
        'perch_events',
    );
?>
```

When you next log into the Perch admin the Events install script will run behind the scenes to create the necessary tables. A new events navigation item will appear in the administration menu.
