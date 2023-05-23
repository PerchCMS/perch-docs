---
title: Usage
nav_groups:
  - primary
---

Perch Backup will show you what it is able to backup – with an indication in the sidebar. Everyone should be able to backup files, however if your hosting does not give you access to `mysqldump` or does not allow you to execute commands from PHP you will need to back your database up via your hosting control panel.

There are 3 options for backup:

- **Resources only** – this will back up the `/perch/resources` folder, so any images or files uploaded by users will be backed up.
- **Resources and customizations** – this is useful if you are about to upgrade Perch. It will take a backup of resources, templates, apps, config and plugins.
- **The entire Perch directory** – this may again be handy before upgrading as it would allow you to put Perch back, exactly as it is if there were any problems.

## Important

We do not back up your site pages – these are outside the Perch directory. This includes the physical pages created by the Perch Pages App. You should periodically download these to your local copy.

If you backup MySQL this will download your entire MySQL database. If you have other tables as well as Perch tables in that database they will be downloaded as well, and will be available to any Perch user with access to this app.

_Before relying on a backup please check everything is in there and you can open the ZIP and read the contents!_
