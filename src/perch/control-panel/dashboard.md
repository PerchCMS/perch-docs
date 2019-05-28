---
title: Dashboard
nav_groups:
  - primary
---

The default view when logging into Perch is to see a list of your content organized by the Page it displays on. However for more complex sites we also have the Dashboard.

To enable the Dashboard check the Enable Dashboard Setting in the settings area of the Perch Admin area.

Most apps will place a Widget on the Dashboard, what content these display depends on the app.

There are currently Dashboard Widgets available for
[MailChimp](https://grabaperch.com/add-ons/dashboard/mailchimp),
[Campaign Monitor](https://grabaperch.com/add-ons/dashboard/campaign-monitor) and more.

## Adding additional Widgets


We have some Dashboard Widgets that are simply standalone widgets without any other app functionality. For example a widget that displays the Perch updates feed, and one that links to your Campaign Monitor account to display stats for a list.

These are installed in the same way as other apps, by placing the folder into **perch/addons/apps** and then reloading the dashboard in your browser. Any Settings you need to configure will then appear on the Settings Page in Perch.

## Creating your own Widgets

Widgets are simple to create and can be as simple as some static HTML that you would like to display on the Dashboard for your clients. See the [dashboard documentation](/api/dashboard) and also a tutorial explaining how to get started by [creating an HTML only widget](/solutions/create-a-dashboard-widget).
