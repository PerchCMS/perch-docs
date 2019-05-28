---
layout: video_youtube.html
nav_groups:
  - primary
title: "What are Perch Regions?"
video_id: ahEijFC1p9c
---
## Video Transcript

To start editing Perch Content you need to add a Perch Region to your page. This video explains Perch Regions.

A Perch Region is created by adding a PHP function called `perch_content` to the page. The function takes one value. That's a string and the name of the Region you want to show up in Admin.

The `perch_content` function runs when the page is loaded. If Perch doesn't already have a region with that name for the page, it creates a new Region with the name you passed into the function. That new region is flagged up in your Control Panel for that page. You can then choose a template and add content.

When the page is loaded and the region already exists, Perch loads any template and content for the Region.

You can add as many Regions as you like to a page. For example my homepage here has a heading and a strapline. I could make that whole heading area a Perch Template with fields for the heading and strapline. Then just have one Perch Region, selecting that template in admin.

Or, I could add two Regions here. One for the Heading, one for the Strapline.

When these show up in admin I could then simply use the single line text field for each one. The decision you make depends on how you want the content to be edited - there is no right or wrong way.