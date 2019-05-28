---
title: Enabling Debug
nav_groups:
  - primary
---

When developing your site locally it can be helpful to turn on the Perch debug mode.

Add the following line to your `perch/config/config.php` file.

```php
    define('PERCH_DEBUG', true);
```

This will output debug underneath your admin area. If you also want to show debug at the bottom of pages on your site, add the line above and then add the following to any page where you want to see debug (or into a global footer layout or include).

```php
    <?php PerchUtil::output_debug(); ?>
```

This will only output if you have turned on PERCH_DEBUG in your configuration file.

The debug output gives you information about SQL queries run, templates used and the last PHP error output so can be very helpful in spotting problems.
