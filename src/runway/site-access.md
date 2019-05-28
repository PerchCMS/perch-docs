---
title: Controlling site access
nav_groups:
  - primary
---

Runway has two features available for controlling access to your site; site behind login, and offline mode.

## Site behind login

Designed primarily for staging sites, _site behind login_ enables you to deny access to pages of your site to any user who is not logged in to the Runway control panel.

This is ideal for staging sites, as it means that pages are inaccessible to accidental visitors and search engines, but your clients and teammates can log in to Runway and then browse the site as normal.

The feature is enabled in your config file for the site:

```php
define('PERCH_SITE_BEHIND_LOGIN', true);
```

When `PERCH_SITE_BEHIND_LOGIN` is set to `true`, any page views that are not authenticated will receive an HTTP 403 response, and will be delivered the `templates/pages/errors/403.php` master page.

(This is a config file option for best performance. Checking if the user is logged in is a small amount of work, but work that shouldn't be done unless it's needed. If the site is never behind a login, then all that work for every page load would be wasted.)


## Offline mode

Another way to control access to your site is by setting it as offline. This might be useful for a new site about to launch, of for performing sweeping changes during which you would like to deny access.

To make a site offline, go to the Settings section and check the "Make site offline" checkbox, and save.

When a site is offline any page views will receive an HTTP 503 response, and will be delivered the `templates/pages/errors/503.php` master page.