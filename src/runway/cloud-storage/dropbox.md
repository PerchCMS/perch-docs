---
title: Dropbox
nav_groups:
  - primary
---

Use the following procedure to configure a resource bucket for use with a Dropbox account. This is primarily useful for storing backups, as Dropbox isn't designed for serving files. Perch Runway stores backups in resource buckets, so configuring a Dropbox bucket is ideal for this purpose.

## Setting up Dropbox

Getting started with Dropbox takes a few steps, but should only need to be done once. We need to set up your Perch Runway site as an app that will use your Dropbox account. The process goes like this:

1. Create an App on the Dropbox website
2. Get an secret access token as a result
3. Add the token to your Runway config file

### Creating a Dropbox app

Follow these steps using the Dropbox account you want to store the files in.

1. Log into Dropbox and go to the [App Console](https://www.dropbox.com/developers/apps).
2. Click the blue **Create app** button
3. Select the **Dropbox API app** option
    - You need to store **Files and datastores**
    - **Yes**, your app **can be limited to its own folder**
4. Give you app a name - we suggest using the name of your website. This will create a folder in your Dropbox account as `/Apps/YourAppName`. This is where your backups will go.
5. Click **Create app** to submit the form

This creates the app, and you should now be looking at the *Settings* tab showing its details.

The next step is to get an access token. Find the **OAuth 2** section of the page.

1. Under **Generate Access Token** click **Generate**
2. You'll be given long string of random letters and numbers - this is your access token.
3. Copy the token to your clipboard.

Next, open up your `perch/config/runway.php` file and look for the Dropbox section. It looks like this:

```php
'dropbox' => [
    'access_token' => '',
    'handler'      => 'PerchDropbox_ResourceBucket',
    'handler_path' => PERCH_CORE.'/runway/apps/perch_dropbox/PerchDropbox_ResourceBucket.class.php',
],
```

Add your new access token where indicated, and save the file. You should be set to go.

## Add a resource bucket

Open up your `perch/config/buckets.php` file. By default it is empty. Create a new bucket - we'll call this one `backup`

```php
<?php
    return [
        'backup' => [
                 'type'      => 'dropbox',
                 'web_path'  => '',
                 'file_path' => 'backups',
         ],
    ];
```

The `file_path` should be the name of any subfolder you wish to store the files in. The `web_path` can be left empty. The `type` is always `dropbox`.
