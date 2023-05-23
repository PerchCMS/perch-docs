---
title: Upgrading Perch to Runway
nav_groups:
  - primary
---

Upgrading a Perch site to Runway is a relatively straightforward process. Depending on the complexity of your Perch site, and how much of a conversion you want to do on existing content in may take a few steps.

We would not suggest that this is something you do on a live site. Instead make a copy of your site locally with a dump of your database. Then you can make sure that everything is working well before you deploy it live, and if something strange does happen you can just start over and ask for our help.

## Buying and applying a license upgrade

If you currently have a Perch 2 license, the first thing you'll need to do is [purchase a license upgrade](https://grabaperch.com/buy/). Once you have an upgrade available in your account, it can be applied to the Perch 2 license you wish to upgrade.

Applying an upgrade to a license does the following:

1. Locks down the state of your Perch 2 license - your live site will continue to work with the Perch 2 license key, but you can't modify the domain details further.
2. Replaces your Perch 2 license key with a Runway license key
3. Makes the Runway files available to download

This enables you to keep your current Perch 2 site running with the old Perch 2 license key, while working on the Runway conversion in your development environment.

## Upgrading to Perch Runway: The Steps

1. Add your new Runway license key to the `perch/config/config.php` file
2. Copy the `perch/core` folder across
3. Copy the contents of `perch/addons/apps` across
4. Configure your web server with the appropriate [rewrite rules](/runway/installing/rewrites/)
5. Copy the `perch/config/runway.php` file to your `config` folder
6. Add the following line to your `perch/config/config.php` file:

    `define('PERCH_SITEPATH', '/server/path/to/your/site');`

## In more detail

### Edit the Config file

Open your `perch/config/config.php` file and replace your license key with the Runway key. Also in this file add the following line:

    define('PERCH_SITEPATH', '/server/path/to/your/site');

If you have a [multiple server configuration file](http://solutions.grabaperch.com/development/multiple-server-config) add this into each site definition so it is accurate for that environment.

### Replace Perch Core

Replace the `perch/core` folder in your site with the one from the runway download files.

Copy the contents of `perch/addons/apps` from the runway download files into your `perch/addons/apps` folder.

### Edit your rewrite rules

Edit your `.htaccess` file, or create one if you don’t already have one to add the [rules specified in the documentation](http://docs.grabaperch.com/runway/installing/rewrites/) for upgrading sites.

### Run the upgrade!

Now log into your Perch control panel.

Perch will do the usual version update you should be familiar with and should tell you it has successfully updated.

If you have debug on and are updating from Perch to Perch Runway you will see all kinds of red “error” messages in the debug output below the continue button. Don’t worry about these, this is just where we are checking what is already there before creating things.

Click Continue - you are now running Perch Runway!

This is a good point to check if your site still works before doing anything else. If pages aren’t loading or content seems missing the most likely cause is simply routing - the Runway rewrite rules perhaps conflicting with something you already have. If you can’t figure it out [post to the forum](https://community.perchcms.com/forum/) with details of your site architecture and existing rewrite rules and we’ll help you out.

You could leave your site at this point if you like. If your upgrade to Runway was for a feature such as CDN support, you don’t need to go though the next steps of moving a Perch site to a Runway architecture at this point.

If you do want to fully convert your site - read on!

## Making your Perch site more Runway-like

Perch Runway assumes a different architecture to standard Perch. In Perch you have lots of physical pages, either created by hand or created by Perch through the control panel.

Perch Runway has a front controller pattern and creates pages by routing to a master page (which defines the layout) and populating it content stored in the database with no need for a physical file. Our upgraded site is in a bit of a half and half state right now. The first thing we might choose to do is turn physical pages into Runway style pages.

The steps to do this are as follows.

1. Take a physical page
2. If you do not have a master page for this layout save it into `perch/templates/pages`
3. Delete the physical file
4. Go to the page in the Perch admin and select the new master page or choose an existing one
5. the page will now load using the master pages

If you are converting a site and have added the additional rewrite rule:

    RewriteCond %{REQUEST_FILENAME} !-d

You will need to do this process a directory at a time. I’ve described my process of doing this on my own site below.

### An example

On my site I have an about section. There is a physical folder `about` and in that is index.php which uses a layout only used by the about homepage, and biog.php and privacy.php which have the same layout and Perch Regions.

I take `about/index.php` and save it as `/perch/templates/pages/about.php`.

I take `about/biog.php` and save it as `/perch/templates/pages/simple.php` as that page layout is just my very basic layout if I want a simple page of content.

I also need to remove the Perch Runtime include from the files as Runway includes it automatically.

I then delete the about directory and pages from my site.

I now log into Perch and set up my Master Page under Master Pages. Then find the pages in the Page Tree. As we didn’t remove these from Perch they will still appear - which is what we want. I go into my About page and set the path to `/about` and choose the Master page `About` then save the page.

I go to Biog and set the path to `/about/biog` and the Master page to `simple`. I go to Privacy and set the path to `about/privacy` and the Master page to `simple`.

If I now go to my site my pages are loading with all the content that they had before.

If I make changes to my Master page `simple.php` I will find that any pages using that Master page update.

## Next Steps

You can now take a look at the other features Perch Runway has - such as CDN support and Collections and see how they might help you enhance your site. In particular, if you have pages of your site being used simply to store content for reuse you might like to turn these into a Collection - [see the documentation here](/runway/collections/).
