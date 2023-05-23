---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the Twitter App checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download where you will find:

- `addons/apps/perch_twitter`

Copy the `perch_twitter` folder into `perch/addons/apps/`

Add `perch_twitter` [to your `apps.php` file](/docs/installing-perch/installing-apps/).

Once you have installed the app, log into the Perch control panel. The Twitter app will show up as a new option in your Apps menu. When you visit the app for the first time the app should install itself.

## Registering a Twitter app

To get started, go to [dev.twitter.com/apps](https://dev.twitter.com/apps) and create a new Twitter app. Be sure to fill out the optional Callback URL field – the value doesn’t matter, you can use your homepage URL.

Completing this process will give you a Consumer Key and Consumer Secret. Back in the Perch Twitter app, enter these on the settings page. You should then be asked to authenticate with Twitter.

This cumbersome process is part of the Twitter OAuth requirements.

## Downloading tweets

To start caching Tweets enter your Twitter username(s) on the Settings page. You can add as many names as you wish here.

After submitting this form, go to the Tweets page and click Get Tweets. This will cause the app to download the latest posts made by the accounts added here, and also any tweets from other accounts that have been marked as favorites. Creating a favorites list is one way to display user feedback on your site as described in this blog post.

## Updating the tweets

There are two ways to update the Tweets in the cache. The first is by clicking the Get Tweets button in the admin interface.

The second is to set up a [scheduled task](http://docs.grabaperch.com/docs/scheduled-tasks/).

## Displaying tweets

You can get started displaying tweets very quickly. Add this to a page:

```php
<?php
    perch_twitter_get_latest();
    perch_twitter_widget_js();
?>
```

This will pull in the latest tweets (as listed in the control panel) and then add the JavaScript Twitter uses to turn the basic HTML into rich embedded tweets.