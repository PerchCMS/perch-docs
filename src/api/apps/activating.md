---
title: Activation
nav_sort: 2
nav_groups:
  - primary
---

Apps that store data need access to database tables. It’s best, if at all possible, to create these tables seamlessly without requiring the user to go through an installation procedure. We call the process of setting up your tables and any other related stuff your app needs to do in order to operate activation.

Activation happens inside `perch/addons/apps/my_app/activate.php`. This script should create your tables, do what it needs to do, and then return true if it worked or false if it didn’t.

If you’ve built your classes on top of `PerchAPI_Factory`, the activation process is kicked off with a call to `PerchAPI_Factory::attempt_install()`. This checks for the existence of the table named in `PerchAPI_Factory::table`, and if it’s not there, runs your activation script.

You need to figure out the logic on when to attempt installation, as it would be wasteful to check on every page load. Usually, the front page of an app is a listing page. It’s our recommendation that if this listing returns no results, that would be the best time to attempt to install. Once the user has added data, then it’s clear everything is set up and there’s no need to try again.

The official Perch apps all contain activation scripts. These can be used as a template for your own.

