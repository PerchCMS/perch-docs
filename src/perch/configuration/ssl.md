---
title: SSL Configuration
nav_groups:
  - primary
---

If your site uses SSL for some or all of the pages, you can use the below setting to make Perch aware of this. When `PerchSystem::force_ssl()` is called, Perch will only force the switch to HTTPS if `PERCH_SSL` is set to true.

This is useful for development or staging environments where SSL isn’t available, but you want to set everything up ready to use SSL when the site is live.

When PERCH_SSL is set to true the Perch control panel will switch to HTTPS automatically.

## SSL

|Setting|Value|
|-|-|
|PERCH_SSL|True or false. Enable the use of SSL.|

## Forcing SSL from the page

To force a page to switch to SSL, add the following before any HTML is output to the browser. (The best place is right after the runtime include.)

```php
<?php PerchSystem::force_ssl(); ?>
```

Perch will redirect from `http://` to `https://`.

## Doing the reverse

If you want to make sure a page *isn’t* loaded using SSL you can do that too.

```php
<?php PerchSystem::force_non_ssl(); ?>
```

Don’t try and do both at once, as the universe may implode.
