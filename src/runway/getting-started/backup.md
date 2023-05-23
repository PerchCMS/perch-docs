---
title: Backup
nav_groups:
  - primary
---

Perch Runway will use the [Scheduled Tasks](/runway/getting-started/installing/scheduled-tasks/) system to automatically run backups of your database and assets uploaded into Perch.

For backups to work *you must have scheduled tasks configured*, and you must have at least one remote (cloud storage) bucket configured in your buckets list.

You must also set up a non-public folder for backup to use as a temporary working folder in your `config/runway.php` file. See the 'Environment' section in that file.

## What gets backed up

Perch Runway will back up content added through the Perch Control Panel and that is stored locally. That includes locally stored asset files and the database. It does not back up your site files, configuration, templates etc, as you should already be managing those with some sort of VCS like Git or Subversion. It also does not back up asset files that are already on a remote storage system.

The backup system is for backing up content changes that happen once your site has gone live.

## Creating a backup plan

Backups are managed from the Settings section, which you can find by clicking the cog icon in the sidebar in Perch Runway.

Under *Add plan* you can give your backup plan a title (e.g. "Daily") and then choose to backup either just the database, or the database and your asset files.

Set the number of hours between each database backup. For a busy site with lots of editing activity, you might want this to be once a day or more. For less frequently updated sites, once a week (168 hours) or even once a month (720 hours) might be acceptable. We recommend backing up more frequently - it's always better to have a few too many backups than not enough.

Backups are saved to a remote resource bucket. You'll need at least one bucket configured to use [cloud storage](/runway/cloud-storage/) to place your backups into. It should ideally be to a different, non-public storage folder than you use for storing assets.

## Running a backup

Backups run automatically, using the scheduled tasks system. The database will be backed up with the frequency you set, and asset files will be backed up on a rolling basis. (Asset files don't change, so they only need to be backed up once.)

## Restoring a backup

Once the backup has run, you can choose any prior database snapshot and restore it from the list.

After successfully restoring a backup, Perch will ask you to reauthenticate, as it needs to check your credentials against those now held in the newly restored database.

## Restoring into a fresh installation

If you're setting up a new copy of a site, you can restore a backup from any remote bucket.

1. Configure the remote bucket in your `perch/config/buckets.php` file. See [Resource Buckets](/docs/resources/buckets/).
2. Under Settings > Backup, choose the Restore tab.
3. Find your bucket in the list and choose _Find backups_
4. Locate your backup and click _Restore_

After successfully restoring a backup, Perch will ask you to reauthenticate, as it need to check your credentials against those now held in the newly restored database.
