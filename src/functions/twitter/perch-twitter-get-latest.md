---
title: perch_twitter_get_latest()
addon: perch_twitter
nav_groups:
  - primary
---

Return latest tweets from a Twitter account or multiple accounts with `perch_twitter_get_latest()`.

## Requires

- Perch Twitter App installed
- PHP cURL libraries

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|twitter_id|The Twitter account username|
|type|Set to either 'favorites' or 'mine' default is 'mine'|
|count|The number of Tweets to return|
|exclude_replies|Setting this to 1 will exclude any @replies from the returned tweets, default 0|
|template|A template to overwrite the default. This should be stored in perch/templates/twitter. |

## Usage examples

Get tweets from all accounts using the default templates.

```php
<?php perch_twitter_get_latest(); ?>
```

Get 1 tweet from the account `grabaperch`, of type `favorites` excluding replies.

```php
<?php
    perch_twitter_get_latest(array(
        'twitter_id'=>'grabaperch',
        'type'=>'favorites',
        'count'=>1,
        'exclude_replies'=>1
    ));
?>
```

Get 3 tweets from the account `grabaperch`, of type `favorites` excluding replies, assign the result to a variable `$tweets`.

```php
<?php $tweets = perch_twitter_get_latest(array(
  'twitter_id'=>'grabaperch',
  'type'=>'favorites',
  'count'=>3,
  'exclude_replies'=>1
),true); ?>
```
