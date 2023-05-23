---
title: Perch Scheduled Tasks
nav_groups:
  - primary
---

Some tasks can be automatically run on a schedule. In order to do this, you need to configure your server to periodically run a script.

The script should be set to run as frequently as your most frequent task. If you wanted to update from Twitter every 15 minutes, your script should run at least every 15 minutes.

## Setting up a secret

To prevent the scheduled tasks being run accidentally, you need to configure a ‘secret’ in your `perch/config/config.php` file. This should be URL-safe letters and numbers, and no spaces.

```php
define('PERCH_SCHEDULE_SECRET', 'mysecret');
```

## Scheduling with cron

You can set up the script to run on the command line, or via a scheduling system like cron. Many hosting control panels will give you access to set this up.

```php
php /path/to/site/perch/core/scheduled/run.php mysecret
```

If you check the Scheduled Tasks page under Settings in Perch, you should see the full path you need to use.

Note that some servers may require a path to the `php` command (perhaps something like `/usr/bin/env php` rather than just `php`) so check with your host.

## Scheduling via a URL

You can also run the scheduled script via a URL in a browser (useful for remote scripts or Windows scheduled tasks).

```php
http://yoursite.com/perch/core/scheduled/run.php?secret=mysecret
```

## Task history

You can view a log of the tasks that have run from the Scheduled Tasks page under Settings in Perch. This log keeps the ten most recent runs of each individual task. Older log entries are purged automatically.
