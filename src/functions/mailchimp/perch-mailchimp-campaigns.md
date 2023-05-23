---
title: perch_mailchimp_campaigns()
addon: perch_mailchimp
nav_groups:
  - primary
---

The `perch_mailchimp_campaigns()` function shows a listing of your campaigns. This enables you to display an archive of previous emails on your site.

## Requires

- The Perch Mailchimp App installed
- A Mailchimp account

## Parameters

| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|list|a listID if you only want to display the campaigns from one list|

## Usage examples

To show an archive listing of your campaigns on a page use the following code. This will show all lists unless they've been hidden using the option in the Lists section of the MailChimp app within the control panel.

```php
<?php
	perch_mailchimp_campaigns();
?>
```

Set the list ID as the `list` option to show just one list:

```php
<?php
	perch_mailchimp_campaigns([
        'list' => 'abc123',
	]);
?>
```
