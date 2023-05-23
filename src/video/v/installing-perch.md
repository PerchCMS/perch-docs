---
layout: video_youtube.html
nav_groups:
  - primary
title: "Installing Perch"
video_id: 8TKpL3w_osM
---
## Video Transcript

If you haven’t done so already log into your account on the Perch website and download the Perch files. While you are there, enter your live domain plus development and staging domains where this license will be run.

Unzip the downloaded file.

Inside you will find a perch folder and two PHP pages – example.php and search.php.

Copy the perch folder into the root of your website.

Visit /perch through your browser, you should be presented with the Setup page which will ask you for some details.

The details you complete under Main Administrator Account will be how you log into Perch.

Under Database Settings you need to add your database information, if you ran the Server Compatibility Test use the details that got you a pass there.

Click Next. For the majority of people you will get a screen with some code that you need to copy into your `perch/config/config.php` file. If Perch is able to write to that file we will do this step for you so if you move onto the next step without having to do this.

If you need to copy the code, do this now and then click “I’ve done that”. You have now installed Perch.

Follow the steps to delete the Setup folder and make the `perch/resources` folder writable. Then log into Perch using the details you set as the Main Administrator account.