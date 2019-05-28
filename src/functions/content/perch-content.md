---
title: perch_content()
nav_groups:
  - primary
---

Displays a content region on the page. If a region with the specified key doesn't exist, one is created.

Creating an editable region with `perch_content` is the basis of editing content with Perch.

To cause Perch to recognize a new editable region you must use a `perch_content` function as in the below example:

```php
<?php
  perch_content('Intro');
?>
```

Adding the above tag to any page that has Perch included and then refreshing the page will cause a new Region to show up in the Perch Control Panel with the name “Intro”. You can then add a template to the region in the Perch admin UI.

## Parameters

### Region key

A name (string) to identify the region. This can include mixed case, spaces etc and is displayed as the title of the region within the control panel. Make it readable, but concise.

### Return

Optional, `true` or `false`. To return the HTML output of the region, rather than output it directly to the page, pass a second argument of `true`.

```php
<?php
	$my_var = perch_content('Intro',true);
?>
```

## Troubleshooting perch_content

If you create a new editable region using `perch_content` and the region does not show up in admin then check that PHP is not throwing an error. Errors on a live site may be suppressed and written to an error log.

A common cause of problems is having the path to the Perch runtime incorrect, so check that you have included Perch at the right location.
