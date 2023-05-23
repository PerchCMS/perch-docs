---
title: Updating
nav_groups:
  - primary
---

Updating the Mailchimp App is usually a case of replacing the `perch_mailchimp` folder in `perch/addons/apps`. See the [Changelog](/addons/mailchimp/changelog) for details of what has changed between the version you are updating from and the latest.

If you are updating from a version of the App older than **version 3.0** read the below important information.

The new version has a different database layout to work with the new MailChimp API. You should remove the old app and the old tables from your database and then install this new version fresh. You won't lose any data as the App syncs up with Mailchimp.
