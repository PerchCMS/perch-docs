---
title: Changelog
nav_groups:
  - primary
---

All notable changes to Perch Members.
## 1.6.6
- Fixes for warnings

## 1.6.5
- New Filtering for Members you can search members by Name, Email, Registered Date, and Status.
- New Feature  `Download CSV​` , user can download a list of Members from the  Perch Control Panel
- New Feature `Notes` capturing for each member on Perch Control Panel, logs the date added and by which user.
- New Feature `Documents` admin can upload any Document that wishes to save for the member
- Available only for subscriptions under <a href="https://account.perchcms.com/runway-addons">https://account.perchcms.com/runway-addons</a>



## 1.4

- Improves support for access restriction on routed pages in Perch Runway

## 1.3

- Adds new `force_download` switch to disable the HTTP headers which force the browser to save rather than display a file
- Automatically logs users in after successfully registering when moderation is not in place
- Allows for account creation without a password

## 1.2

- Fixes bug with `perch_member_remove_tag()`
- Adds compability for Perch and Perch Runway 2.8

## 1.1

- Add the `member.html` master template used for editing members from the control panel
- Adds `perch_member_remove_tag()` page function
- Modifies `perch_member_add_tag()` to update when the tag has already been set
- Form default tags can now have an expiry, e.g. `subscriber|+3 months`
- Rewrites the members template handler to use less memory

## 1.0 - 1.0.3

- Initial release, pre changelog.
