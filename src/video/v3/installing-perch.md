---
layout: video_youtube.html
nav_groups:
  - primary
title: "Installing Perch"
video_id: xE0mRj_bOSg
collection: video_getting_started
video_order: 2
duration: "2:56"
desc: The steps you need to follow to successfully install Perch on your website. 
---

If you download Perch from the Perch website, your download is a zip file. Open that zip file, you'll find inside there's a `perch` folder and also a couple of example pages. Take the Perch folder and copy that into the root of your website. If you'd like to rename the folder to something else for instance `cms` or `admin`, you can do that now. If you do so remember that you will need to now use that folder name instead of `perch` in any paths.

Once you've got Perch copied over, you need to go to your web browser and visit `/perch`, or the name that you named that folder to. If you are using a local server at localhost then you would visit `http://localhost/perch`.

At this URL you will find a setup form which also tests your environment to make sure it can run Perch. 

The database host name is very often localhost on your live web hosting and also locally. Your web host should be as tell you though if you need to enter an IP address or something else. I'm using Docker so my container is actually called `db` rather than localhost, so I'm putting that in here.

Then add the name of your database. This will be whatever you set up locally, or the name that your hosting company gives you for your database. Next add your database username and password. Again, ask your host for this or this is whatever your local environment uses.

With everything complete, click test settings. Perch will run a few tests, and all being well, it will all go on and it will actually let you know that you can install Perch. If you've already got a license key, you can just enter that here. If not, check _try out locally_ and hit continue. Now we're setting up some details for the user account in Perch. This is what you will use to log into your CMS, as the admin user. You can set up other users once you've got Perch installed. Remember these details, you will need them to log in. Then hit continue.

That's it, we're all installed. We've checked the server compatibility, we've configured the database, we've entered the license key with local testing, and we've created a user account which we can now use to log in. Log in and you are ready to start creating content with Perch.



