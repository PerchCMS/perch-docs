---
title: Twitter App
nav_groups:
  - primary
---

## Namespaces

The Perch Twitter App uses the namespace `perch:twitter`.

## Master templates

Tweets are imported rather than input in the Control Panel so the Twitter App has no Master Template used for data entry.

## Default templates

| Template | Used for |
|-|-|
|tweet.html|Displaying a tweet|

## Template IDs

| Value | Description |
|-|-|
|tweetHTML| The HTML body of the tweet |
|tweetUser| The Twitter user |
|tweetTwitterID| The ID of the tweet on Twitter |
|tweetUserRealName| The user's real name |
|tweetUserAvatar| The user's avatar |
|tweetDate| The date and time of the tweet |
|tweetText| (use tweetHTML under normal circumstances) |

## Editing Templates

The default templates are stored inside the `perch_twitter/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_twitter/templates/twitter` to
`/perch/templates/twitter` and then make your changes.

If a template has the same name in this folder as the template in the `perch_twitter` folder it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template in the function’s options array.
