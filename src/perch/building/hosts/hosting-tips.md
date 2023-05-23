---
title: Specific hosting company tips
nav_groups:
  - primary
---

We sometimes get tips specific to one hosting company or another. To help you find these we are adding them here. If you have anything to add about a particular hosting configuration - let us know.

## Heart Internet

If you are adding a Scheduled Task (Cron Job) on Heart Internet you need to use the following syntax:

```php
/usr/bin/php55 /home/sites/my_site.co.uk/public_html/perch/core/scheduled/run.php secret=mysecret
```
