---
title: Upgrading to Runway 4
nav_groups:
  - primary
---

Perch Runway 4 is a new major version of Perch Runway with some big interface changes. A lot of the underlying structure is backwards compatible, so upgrading to Perch Runway 4 is not complex. 

## Before you start

Follow these instructions to help make your upgrade as smooth as possible.

### 1. Make a backup

Before making any changes, make a backup of your files and your database. This means that come what may, you can always revert to your current position without doing any damage.

### 2. Work on your dev or staging site

We don't recommend upgrading a live site in-place. Not because the upgrade process is risky, but because that's not the most sensible way to work for any website updates. Get your staging or dev site up to date (perhaps using the backup of the live site you've just made) and try the upgrade there first. If all is well, you can deploy those changes to the live site without worrying and with minimal disruption.

## Upgrading

With that done, we should be ready to begin.

### 1. Replace Perch core

[Download](https://perchrunway.com/download) the latest version of Perch Runway and copy the new `perch/core` folder over your old `perch/core` folder.

### 2. Check your apps file

If you have a very old install to upgrade, your `perch/config/config.apps` file might contain lots of `include()` statements. You need to update it or you'll get errors. A basic starting point `apps.php` file looks like this:

```php
<?php
	$apps_list = [ 
	];
```

You don't need the Content or Categories apps listed like in the past. Just add an entry to the list for any add-ons you need installed. For example, an install with Blog and Twitter apps would have:

```php
<?php
	$apps_list = [ 
		'perch_blog',
		'perch_twitter',
	];
```

### 3. Remove unnecessary add-ons

Perch Runway 4 contains the MarkItUp and Redactor edits as part of core, so you can remove:

- `perch/addons/plugins/editors/markitup`
- `perch/addons/plugins/editors/redactor`

You can remove the default apps, as they're now internal too:

- `perch/addons/apps/perch_s3`
- `perch/addons/apps/perch_openstack`
- `perch/addons/apps/perch_varnish`
- `perch/addons/apps/perch_dropbox`

And update your `perch/config/runway.php` file to change the `handler_path` for those apps to begin with `PERCH_CORE.'/runway/apps/'` e.g.

```php
'handler_path' => PERCH_CORE.'/runway/apps/perch_dropbox/PerchDropbox_ResourceBucket.class.php',
```

### 4. Update your apps

Changes in Runway 4 mean that your Runway 3 apps won't work without being updated. Therefore you need to download the latest versions of your apps from the new [add-ons site](https://addons.perchcms.com/).

### 5. Log in

When you log in to the control panel, the updater will run as usual and you should be all set to go.
