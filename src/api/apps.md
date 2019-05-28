---
title: Apps
layout: section.html
nav_groups:
  - primary
nav_sort: 1
---

When it comes to adding more serious functionality to Perch, you need an app. Apps can be anything from just a couple of quick files to listen for events (see below) to full scale applications built on Perch, such as Perch Shop. They can add pages the control panel, add runtime functions to the page, define custom templates tags and more. They can be powerful and complex, or almost nothing at all. If you want to hook your own code into Perch, an app is usally the route to do it.

## App structure

An app is a folder inside the `perch/addons/apps` folder. Perch scans the file system for these folders and key files within them.

|File|Purpose|
|-|-|
|admin.php|Registers and configures the app|
|runtime.php|Provides page functions to your site pages|
|scheduled_tasks.php|Registers tasks with the task scheduler|
|help.php|Provides help text for the control panel Help page|
|dashboard.php|Builds and renders dashboard widgets|

By convention, you'll often see some other common files

|File|Purpose|
|-|-|
|index.php|The control panel entry point into your app|
|activate.php|Creates database tables, privileges and setting defaults|
|fieldtypes.php|Defines any field types used by the app|
|events.php|Registers event listeners used by the app|

To get started building an app, create your folder inside the `perch/addons/apps` folder, and add an `admin.php` file. Then head over to [registering an app](/api/apps/registering) to find out how to register your app with the CMS.

## Sample app

The best place to get started is to download our sample app and start hacking.

The sample app is called My Sample, with the app ID `my_sample`. That’s an app called Sample from a developer called My.

[Download sample app](https://static.grabaperch.com/docs/api/my_sample_v2.1.zip)

## Naming conventions 

It’s important to think carefully how you name your app, to avoid clashes with other developers.

You should choose a developer prefix which will help your code carve out its own namespace. If you plan to develop multiple apps, this also will begin to act as a brand that users recognize, so choose wisely.

Official Perch apps are prefixed with Perch. Our apps have IDs like `perch_pages` and `perch_events`. The sample app uses the prefix my_. You should pick your own prefix, even if you don’t intend to share your app – it will help avoid conflicts with any other developer’s apps that you might wish to use.

### Folder name / App ID

Your app lives in a folder within perch/apps. You should name the folder for your app with your chosen developer prefix, followed by an underscore, followed by a short name for your app, all in lower case.

So if My Company Inc chose to use the prefix myco and were to build a blog app, they would name the folder `myco_blog`. This becomes the app ID.

### Classes

As Perch 2 supports PHP 5.3 and up, that includes versions before namespacing. Therefore we have to use slightly more long-winded class names to keep them unique.

The app myco\_blog would prefix class names with `MycoBlog_`. So the class name for the Posts class would be `MycoBlog_Posts`

### Page functions

If an app exposes functions to the page (via runtime.php) these should also be prefixed with the app ID. A function to get posts from the `myco_blog` app would be called `myco_blog_posts()`.

### Database tables

Prefix your database table names with your app ID. But wait, there’s more! The user also has a configured database table prefix value via the `PERCH_DB_PREFIX` constant. So you’ll need that too, first. More on `PERCH_DB_PREFIX` later.

The myco_blog app would call its blog posts table `myco_blog_posts`, prefixed with `PERCH_DB_PREFIX`. So with the default configuration, the resulting table name would be `perch_myco_blog_posts`.

(Official apps cheat and drop the developer prefix i.e. perch_events instead of perch_perch_events – you can see why. Don’t hate us, but more importantly don’t copy us.)

As many Perch developers move between Windows and Unix environments when deploying their sites ensure all table names only use lowercase characters, as Windows lowercases table names on export.