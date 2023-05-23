---
title: Diagnostics Report
nav_groups:
  - primary
---

The Perch Control panel contains a Diagnostics Report full of information about your installation of Perch and the hosting environment you have installed it on.

If you raise a support ticket you should always include this report as it gives us the information we need to help you. However, you may well find the report useful to debug your own issues.

## Where is the Diagnostic Report?

You can find the report under Settings in Perch. From Perch 2.5 we display a short report on the first page, which contaisn the information that we most often need to help you in the forum.

You can view the full report from this page. The full report is split into two sections, the first shows things about Perch, the second things about your hosting environment.

## Perch Information

The information here is from your install of Perch, these are things that you can change based on how you have installed Perch.

### Perch and Apps Version

The version of Perch you are currently running can be found at the top of the report. Two lines down are all the installed apps and their versions.

You can then check our News page to see if there are newer versions to update to. We would always encourage you to update relatively frequently as releases include any bugs or issues that have been reported as well as enhancements and features.

### App runtimes

These are the runtimes you have linked in. A common support request is when an App doesn’t work on the front-end of your site – usually that is because the relevant runtime is not linked, so you can check that here.

### Other settings and constants

Below this are the values for a range of settings and constants that Perch uses. These can be useful if you are experiencing a problem but most of the time you won’t need to worry about these.

## Hosting Settings

The information in this setting relates to your hosting. These are things that you can’t change from within Perch and will rely on your changing something about your hosting or raising a ticket with your host. Some of the more useful things are highlighted below.

### Versions of PHP and MySQL

You can check the versions of PHP and MySQL at the top of this section. If you are running PHP 5.2 or MySQL 4.1 we would advise you to upgrade or ask your host to move you to an account with newer software.

### Images and uploads

The next section is important if you want to upload files and resize images.

```
GD: Yes
ImageMagick: No
PHP max upload size: 16M
PHP max form post size: 16M
PHP memory limit: 128M
Total max uploadable file size: 16M
Resource folder writeable: Yes
```

To be able to upload files and images you need to have PHP configured to allow uploads and allow uploads of a reasonable size. Many hosts default this to 2MB, too small for images coming out of digital cameras these days.

To process images, for example to resize them, you also need a reasonable amount of memory. It should be noted that even if you have a good amount of memory detailed here, it may not be available to you if you are on shared hosting, as resources are shared between all users of the hardware.

Perch uses one or other of the two most popular image libraries for processing images (GD and ImageMagick). Whether these are installed is detailed at the top of this section. It doesn’t matter which you have –
if you have neither then the Compatibility Test will have told you this and you will be able to upload, but not process images.
