---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the MailChimp app checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download where you will find two folders.

-   `addons/apps/perch_mailchimp` – the actual app
-   `mailchimp` - containing a few example pages

Copy the `perch_mailchimp` folder into `perch/addons/apps/` in your own site/

Add `perch_mailchimp` [to your `config/apps.php` file](/perch/getting-started/installing/apps).

Log into the Perch control panel and visit the App by selecting it from your Apps menu. This will trigger an install of the app.

## Set up your list

In Perch go to the Settings Page. You will see a new MailChimp section which asks for your MailChimp API Key. You need to get these from MailChimp.

Log into your MailChimp account.

Your API Key can be found under `Account > Extras > API Keys`. If you have already created a key copy it from here, or create a key and then copy it. Paste that into the API Key box on the Perch Settings page, and save the form.

## Initial Import

You can now import your list data for the first time.

Go back to the MailChimp app, which will now start to pull your lists down from MailChimp. If your list is large or you have a lot of Campaigns then this will take a while.

To avoid swamping both your server and the MailChimp API servers (and making the monkey cross), data is pulled down in batches. For lists themselves, it's most likely that those will all be retrieved in one go, but subscribers and campaigns might take longer. If you visit the Subscribers section, the first batch will be downloaded. If you refresh the page, or click the Next pagination button, the next batch is downloaded, and so on until all the data is available.

If you have a lot of data, you probably don't want to sit there clicking Next for hours, so this can be automated by making sure [scheduled tasks](/docs/scheduled-tasks/) are configured. The task scheduler will keep downloading every minute until all the data has been retrieved.

Once the import has finished you should be able to view subscribers and campaigns from within Perch.

## Set up webhooks

**This action will only work on a website that is live on the internet**

Once you install the app on a live site and have imported data you should configure webhooks, by selecting Webhooks from the toolbar and then clicking Sync.

If you run this on a local site MailChimp will not be able to validate the URL and the action will fail.

## Important!

When making your site live you need to run the import and set up of webhooks again, this will ensure your data matches the list on MailChimp so the webhooks can then do their job of keeping it up to date. In that sense, it's not really worth downloading all the data into your dev copy - just grab enough to see it working and then leave that job for live.
