---
title: Updating from Perch 1
nav_groups:
  - primary
---

There is a little more work to be done to upgrade to a new major version as Perch 2 includes some larger changes than would be expected in a dot release.

### Step 1: Upgrade to the latest version of Perch 1

We have tested the upgrader from newer versions of Perch. To be safe, if your Perch 1 version is very out of date upgrade to the latest v.1 release before updating to Perch 2.

### Step 2: Back Up

Back up your site and your MySQL database. That way if anything goes wrong you can always restore things.

### Step 3. Rename your Perch folder

In your existing site rename the /perch folder – something like perchv1 is fine.

### Step 4: Install Perch

Now install Perch 2 as if you were doing a new installation and log into Perch. Perch creates the new database tables alongside your old ones. So when you first log into Perch you won’t see any content – don’t worry, we get it all back in the next step.

### Step 5: Copy Templates and Resources

Copy your templates and resources from the old (renamed) Perch folder to the new one. So that is the content of `perch/templates` and `perch/resources`

### Step 6: Download and install any official apps

[Official apps](http://grabaperch.com/add-ons/apps/) have all been updated for Perch 2 and the [Upgrade app](http://grabaperch.com/add-ons/apps/upgrade) will upgrade their data as well so you should now download any apps you are using in your site.

Install each app as if it were a brand new installation following the instructions for each app. Be sure to click on each app in the admin menu and check that you get no errors – as with content they will be empty right now.

### Step 7: Install and run the upgrade app

Upgrading is done using a [Perch app](http://grabaperch.com/add-ons/apps/upgrade) to give you full control of the process.

Install the [Upgrade app](http://grabaperch.com/add-ons/apps/upgrade) by putting it into `perch/addons/apps`. Visit the app in admin and it will tell you what you have to upgrade. This will always include:

-   Users
-   Settings
-   Content

Then any official apps that you have installed.

Now click on each item in the list in turn.

Perch will copy your content from the old tables into the new ones.

After upgrading all of your content you should find that the content on your site and within Perch is all as it was. Once you have checked that you are happy, you can remove the upgrade app from `addons/apps`
