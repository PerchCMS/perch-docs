---
title: perch_member_secure_download()
addon: perch_members
nav_groups:
  - primary
---

Access a file in a secured resource bucket with `perch_member_secure_download()`. See [Secure Downloads](/addons/members/downloads/).

## Requires

- Perch Members App installed

## Parameters

| Type | Description |
|-|-|
| String   | Name of the file |
| String   | Name of the bucket the file is in |
| Boolean | Set to true just to link to the file rather than force a download |

## Usage examples

Download `report.pdf` from the bucket `my-bucket`. By default, this forces the download of the file (or prompts a Save As box, depending on the browser's configuration). 

```php
perch_members_secure_download('report.pdf', 'my-bucket');
```

If you wish to just link to the file (e.g for a PDF you'd like to give the browser the opportunity to display if possible) you can set the third argument to `false`:

```php
perch_members_secure_download('report.pdf', 'my-bucket', false);
```
