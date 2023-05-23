---
title: Installing Runway
nav_groups:
  - primary
---

The steps below walk you through the process of getting Perch Runway up and running on your server.

Before starting ensure that you have run the Runway Server Compatibility Test on your server and that it passed. Make a note of the database details that you used to pass the test as you will need these during install.

## Step 1: Extract the Perch zip

After purchasing Perch Runway you will be able to download the software. Save the zip file somewhere on your computer and unzip it. Inside you will find a folder named `perch` which is the Perch software.

## Step 2: Put the perch folder into your website root folder

Copy the `perch` folder into your top-level folder.

## Step 3: Visit the setup page

Visit `/perch/setup` in a web browser. You will see a form.

-   The license key is the one from your account for this site.
-   Your details will create the first admin account in Perch.
-   The install location is the location of perch in your site. If you just copied the `perch` folder into the root of your site then `/perch` is correct. If you renamed the Perch folder or put it into a subdirectory you need to update this.
-   The final section is database settings – use the database location, name, username and password that worked for the Server Compatibility Test.

After completing this form, hit submit and Perch Runway will either write your configuration files for you _or_ display a block of configuration code on screen.

If you get the code, copy this code to your clipboard, then open the `perch` directory that you copied into your site earlier, then open the `config` folder and the file `config.php`.

Paste the code into `config.php` using a **plain text editor** and save it. Repeat with the `config.local.php` file.

Back in your browser click ‘I’ve done that’ and Runway will install. Otherwise, move onto the steps below.

## Step 4: Configuring URL rewriting

The next step is to set up URL rewriting for Runway to handle incoming page requests. See the [information on configuring URL rewriting](/runway/getting-started/installing/rewrites/) for step-by-step instructions.

## Step 5: Configuring scheduled tasks

The following step is to set up scheduled tasks. See [setting up Scheduled Tasks](/runway/getting-started/installing/scheduled-tasks/) for more information.

## Final Steps

You should now be able to log into Runway using the username and password you entered in the previous step.

Delete the setup folder from inside the `perch` folder.

Make the `/perch/resources` folder writable by your webserver in order that files and images can be uploaded through Perch Runway. Check with your host how to do this.

For most users these steps will install Perch Runway without any problems. However there are some issues that we see reasonably regularly. These tend to be webhost specific.


### After submitting the form at Step 3. Nothing happens.

This usually means **PHP Sessions** are not configured fully on your server. Ask your host if there is anything you need to do to get PHP Sessions working on your server.

If sessions are configured then the other possibility is that you have something causing a redirect on your server, for example in your `.htaccess` file.
