---
title: Installing Perch
nav_sort: 1
nav_groups:
  - primary
---

Before you start:

1. You need a webserver running PHP and MySQL to run Perch. This could be on your hosting or a local development server.
2. You will need the MySQL database name, username and password.
3. Before you start check that your server meets the current Perch requirements by running the Compatibility Test.
4. Download the zip containing the Perch software.

## Step 1: Extract the Perch zip

Inside the download you will find a file called example.php (which shows you how to add Perch to a page), a default search page (`search.php`), and a folder named `perch` which is the Perch software.

## Step 2: Put the perch folder into your website home directory

Copy the perch folder into your home directory. If you are setting Perch up directly on your hosting company server then FTP the entire folder to the home directory there. If you are going to try Perch out on your own computer you will need to place it into your site.

If you want to rename the `perch` folder to something else - for example `admin` - then this is a good time to do that. The rest of these steps will assume that you ket the default `perch` and that this folder is in the root of your site.

## Step 3: Visit the setup page

Visit `/perch/setup` in a web browser. You will see a form.

-   The license key is the one from your account for this site.
-   Your details will create the first admin account in Perch.
-   The install location is the location of perch in your site. If you just copied the `perch` folder into the root of your site then `/perch` is correct. If you renamed the Perch folder or put it into a subdirectory you need to update this.
-   The final section is database settings – use the database location, name, username and password that worked for the Server Compatibility Test.

After completing this form, hit submit. If we are able, Perch will write your configuration file for you. If your server permissions do not allow that you will see a block of configuration code.

If you get the code, copy it to your clipboard, then open the file `/perch/config/config.php`.

Paste the code into `config.php` using a **plain text editor** and save it.

Back in your browser click ‘I’ve done that’ and Perch will install.

Otherwise, move onto the steps below.

## Final Steps

You should now be able to log into Perch using the username and password you entered in the previous step.

Delete the folder named `setup` which is directly inside the Perch folder.

Make the `/perch/resources` folder writable by your webserver in order that files and images can be uploaded through Perch. Check with your host how to do this.

## Install Troubleshooting

For most users these steps will install Perch without any problems. However there are some issues that we see reasonably regularly. These tend to be webhost specific.

### After submitting the form at Step 3. Nothing happens.

This usually means **PHP Sessions** are not configured fully on your server. Ask your host if there is anything you need to do to get PHP Sessions working on your server.

If sessions are configured then the other possibility is that you have something causing a redirect on your server, for example in your `.htaccess` file.

### You see a message that Perch cannot connect to the database

Perch needs to be able to connect to MySQL. Your host should provide you with a database name, username and password, which you enter during installation. Use the Compatibility Test to check that the details are correct and then use the exact same details during installation. Copy and paste errors or mistyping these details are the usual reason for a compatibility test pass and installation fail.
