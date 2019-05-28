---
title: Webmentions
nav_groups:
  - primary
---

[Webmentions](https://webmention.net) are a way to notify another site that you've mentioned their content on your own site. Take an example:

1. Sarah posts an article to her blog
2. James reads this post and in response creates a post on his own site linking to Sarah's post
3. James' blog software finds the link to Sarah's blog in the post and notifies Sarah's server of the link
4. Sarah's blog software fetches James' post and adds a link to it along with the comments section under her post

In order for the process to work, both sides need to support webmentions. However, if one side doesn't there are no ill effects, the process will just quietly fail.

There are two sides to implementing webmentions - sending, where you can respond to a post on someone else's site, and receiving, where others can respond to you.

## Sending webmentions

If sending is enabled, Blog will notify any sites you link to of your post when it goes live. As posts can go live on a schedule, this is done using [scheduled tasks](https://docs.grabaperch.com/perch/getting-started/installing/scheduled-tasks/).

To enable sending webmentions:

1. Make sure your posts are marked up with microformats classes (see below)
2. In Settings, check the "Send webmentions" box in the Blog section and save
3. Make sure your scheduled tasks are being run frequently (probably at least once an hour, if not once a minute)
4. Make sure your site is in production mode (`PERCH_PRODUCTION`). Webmentions are not sent in staging or dev environments
5. Make sure your site is publicly accessible

When a post goes live, Blog will find the links in your post and check each one to see if they have webmentions capability. If they do, it will notify them of your post.

### Markup with microformats

For this to work well, you should use microformats to mark up your posts. Particularly [h-entry](http://microformats.org/wiki/h-entry) for the post and [h-card](http://microformats.org/wiki/h-card) for the author information.


## Receiving webmentions

When receiving is enabled, others will be able to mention one of your posts on their site and let you know about it. When a mention is successfully logged, it will appear in your comments moderation queue as a comment. You can then edit it or just publish.

To prevent a malicious actor overloading your server, mention notifications are processed in batches by the scheduled tasks.

To enable receiving webmentions:

1. In Settings, check the "Receive webmentions" box in the Blog section and save
2. Make sure your scheduled tasks are being run frequently
3. Make sure your site is publicly accessible
4. Add a call to `perch_blog_post_webmention_endpoint()` in the head of your single post template (see below)

### Advertising your webmentions capabilities

When a remove server checks your post to see if webmentions are enabled, it looks for either a special header, a link in the body, or a link tag in the `<head>` of the page. The last of these is by far the simplest.

In the `<head>` section of your template that displays a single post, add:

```php
perch_blog_post_webmention_endpoint('my-post-slug');
```

Where `my-post-slug` is the slug for your post. In the example files, the slug is on the query string as `s` so that would make the code:

```php
perch_blog_post_webmention_endpoint(perch_get('s'));
```

This advertises your webmentions _endpoint_ for the article, and Blog should start receiving notifications when they are sent.

### Enabling manual pings

If someone writes a response to your post but doesn't have a webmentions-capable publishing system, you can provide them with a form to notify you manually of the URL. To do this, call:

```php
perch_blog_post_ping_form('my-post-slug');
```

ere `my-post-slug` is the slug for your post. In the example files, the slug is on the query string as `s` so that would make the code:

```php
perch_blog_post_ping_form(perch_get('s'));
```

## Requirements

In order to parse the remote URLs for processing webmentions, you'll need the following PHP extensions installed and enabled on your server:

- XML 
- mbstring
- cURL

## Troubleshooting

Webmentions involve a few different moving parts. If things aren't working:

1. Check your scheduled task list to see what the processes are reporting
2. Check your error log for any errors relating to webmentions
3. In the database, see what entries you have in `perch3_blog_webmention_queue`. If it's not clearing, do the IDs increase each time the scheduler runs?
4. Post to the support forum with the above information and your diagnostic report and we'll see if we can help