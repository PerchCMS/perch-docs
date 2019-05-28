---
layout: video_youtube.html
nav_groups:
  - primary
title: "Shared Regions"
video_id: crj6x4jMNek
collection: video_getting_started
video_order: 8
duration: "2:03"
desc: If you have some content that is repeated across your site, then shared content means you do not need to enter the same content for every page.
---

If you have some content that is repeated across your site, then Perch shared content means your editor does not need to enter the same content for every page. 

The contact details we created in the contact details tutorial, they are not just shown on the contact page. They are shown on all the pages of the site, in the footer. We can make these a shared region, and then we can just update them in one place and they'll appear wherever they need to.

To do this, go into region options where you will see a checkbox for _share across all pages_. Select that, and save. And then, in our code editor, we copy out our region from `contact.php` and add it to the footer of any page that needs to show the contact details, in place of the hardcoded details.

If you reload a page after adding the Perch Shared Region you will find the shared content in place.

This is a very simple way to share content. You would use this method when you want to show the content using the exact same template that the first region used.



