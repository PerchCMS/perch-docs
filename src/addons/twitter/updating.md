---
title: Updating
nav_groups:
  - primary
---

Updating the Twitter App is usually a case of replacing the `perch_twitter` folder in `perch/addons/apps`. See the [Changelog](/addons/twitter/changelog) for details of what has changed between the version you are updating from and the latest.

## Upgrade notes for older installations

**Version 3** of this app includes some major changes due to new requirements from Twitter. These include OAuth authentication, version 1.1 of the Twitter API, and new visual display requirements. The Perch Twitter app is up-to-date with all these requirements.

As these changes were significant, we’ve taken the opportunity to also tidy up the way the app works to make it more consistent with some of our newer apps. If you used a previous version, you’ll need to make some changes in your pages.

As well as new templates and a Feather to meet display requirements, the two main page functions have changed to take option arrays rather than a long string of arguments.

```php
<?php
perch_twitter_get_latest('screen_name', 'mine', 10, true, 'tweet.html');
?>
```

becomes:

```php
<?php
perch_twitter_get_latest([
	'twitter_id'      => 'screen_name',
	'type'            => 'mine',
	'count'           => 10,
	'exclude_replies' => true,
	'template'        => 'tweet.html',
]);
?>
```

See the [page functions documentation](/addons/twitter/page-functions/) for a full guide.

**Version 3.6** updates and integrates the `tweet` field type into the app itself. This makes things simpler for new installs. If you're updating an older install, you need to remove the `addons/fieldtypes/tweet` folder that you may have added previously.

**Version 4.0** brings the app in line with the Twitter guidelines for CMSs. As a result, the default `tweet.html` template is greatly simplified, falling back on more of Twitter's own widget code.