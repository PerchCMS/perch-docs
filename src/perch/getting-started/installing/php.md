---
title: PHP
nav_sort: 1
nav_groups:
  - primary
---

**Perch 2.5 (June 2014) now requires PHP 5.3 or greater. The next version of Perch will require PHP 5.4 or greater.**

You can find out the version of PHP you are running in your Perch Diagnostic Report. Under Settings in the Perch Admin is a link to the Diagnostic Report. The first section is details of your Perch installation, the second tells you all sorts of things about your hosting – including versions of PHP and MySQL.

If you are on shared hosting then a support request to your host should be enough to upgrade your account. We’d suggest going to the newest version they offer, which should be 5.6 or 7 at this point (there is no PHP 6). Shared hosts will often have servers running old versions of PHP and only move people if they ask – as older applications might throw errors on newer versions of PHP. If your site is just running Perch, upgrading will cause you no problems. We issue updates to ensure the latest release of Perch 2 fully supports the latest version of PHP.

If you are on a shared host who refuses or cannot upgrade you, that is a very strong reason to move away from that host. Or at the very least ask them how they justify keeping people on servers running a version of PHP that is not getting security patches and therefore vulnerable to attacks.

If you are running your own server or VPS then you should also upgrade, or ask your host to help you do so.

## Why is this important?

PHP 5.2 is [end-of-lifed and unsupported](http://php.net/eol.php) now by PHP. Therefore you run the risk of security and performance problems if you stay with it.

Supporting such an old version of PHP also slows down how quickly we can release features and add-ons for Perch itself. There are improvements in 5.3 that enable us to far more quickly ship code – this is good for everyone!
