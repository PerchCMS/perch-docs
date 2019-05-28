---
layout: video_youtube.html
nav_groups:
  - primary
title: "Running the Compatibility Test"
video_id: 8wTZZ4Ae2SQ
---
## Video Transcript

If you are thinking of buying Perch for your next project, the first thing you need to do is check that Perch can run on the hosting you are using.

Perch has very simple requirements of PHP 5.3 or up and MySQL and can run on servers running Unix for example Linux and Mac OSX as well as on Windows. However before purchasing you can check that your server supports it.

Visit the requirements page at [http://grabaperch.com/requirements](http://grabaperch.com/requirements) and download the Server Compatibility Test Suite.

Unzip the download and upload the perchtest folder to your server (or if you are working locally place it into your site as I am doing here.)

Then visit /perchtest in a web browser. So if your domain was www.example.com you would visit http://www.example.com/perchtest

The script will immediately check that your server can run PHP and that you have PHP version 5.2.

If the PHP checks go through you will see step 1 of the test which asks you for your database connection details.

Server is prefilled to localhost. All localhost means is that the database is on the same server as your site. If you are working on your own computer as I am this will be correct. For many hosts this will also be correct, but some larger hosts have separate servers they use for databases. If this is the case you will have been given an IP address or URL for the database server by your host. Replace the default localhost with this.

Database is the name of the database that you will use to install Perch and store the content for your site. Perch needs this to be created before installation.

Your hosting account may already come with a database, in which case the name of this database should be in your account details. Often you are able to create databases using your control panel – for example in CPanel there is a page to create new databases and assign users. Put the name of your database in here, you will also have a username and password to access the database which you will need to enter.

Submit this form. Behind the scenes Perch will attempt to connect to your database, create a table, insert, update and delete some data. It will also check that PHP sessions are working correctly. If all these things check out you will get a PASS from the test and you will be able to run Perch on this server. Make a note of the details you used to successfully connect to the database as you will need these when you come to install Perch.

If you see the screen here it means we have checked your installation environment and you should have a great experience installing and running Perch. You may see one or more of our advisory messages on this screen however and these indicate things you may wish to raise a ticket with your host about.
No image resize functionality.

Perch requires PHP modules that enable image resize, these are very common but if you see this message ask your host to enable either GD or ImageMagick.

### No native JSON support.

This is enabled by default in PHP5.2 so you should have it, without native JSON Perch will work but will be slower so it is worth asking your host to enable it.

### No filter support.

Filter enables better serverside form validation in Perch and you should ask your host to enable it.

### Safe mode may be enabled.

Safe mode is a legacy PHP mode that has been removed from newer PHP versions. You are likely to run into a range of problems using it and we’d recommend turning it off. You sometimes find it is enabled in servers managed via Plesk Control Panel, and you can turn it off in Plesk.

If the test tells you that your server can’t run Perch or that the test has been unsuccessful, don’t panic. If your server does support PHP5 and MySQL it is most likely that you can run Perch, you may just have to make a support request of your host or check the details you entered.

If you received a message saying, “Sorry, your server doesn’t run PHP” then you will need to get hosting that does support PHP to run Perch as this is the language it is written in. The good news is that PHP and MySQL hosting is easy to find and inexpensive.

If you received a message saying, “Perch requires PHP 5.3 or greater.” Your server does have PHP installed but it is probably an old version of PHP5 or even PHP4. Most often hosts are supporting old versions of PHP for customers who have legacy sites and will be able to switch your account to a server running a newer version, if they cannot we’d advise changing hosts as the version of PHP they are running is liable to have security problems being so out of date.

If you got as far as the database connection page then the errors you see will generally be due to incorrect database details or that the database user does not have enough permissions.

“Please provide a full set of database details” or “Could not connect to the database with the information provided.” means that either your server, database name, username or password was missing or incorrect. Check these with your host.

The next set of errors are all to do with permissions. The database user that you are using to connect to Perch needs to be able to CREATE, UPDATE and DELETE tables and also INSERT and UPDATE data in the tables. Raise a ticket with your host if you do not know how to give your database user permissions.

Errors we see very rarely are “Perch needs at least MySQL version 4.1 to run.” – Version 4.1 is a very old version at this point, if you see this you will need to speak to your host about upgrading to a newer version of MySQL. Also “PHP Sessions are not functioning as expected.” – on a very few hosts, you need to actively configure PHP sessions. If you see this message ask your host how to configure PHP sessions.

If you try these steps and are still having problems getting the test to run please raise a support ticket in our support area. We will be happy to help you through the compatibility test even if you have not yet bought Perch. The good news is that once you have this test running successfully you should have no trouble getting Perch installed – just make sure you remember the MySQL connection details that worked!

Remember to re-run the test if you move Perch between servers. If the test runs you should have a straightforward install or migration process.
