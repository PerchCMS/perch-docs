---
layout: video_youtube.html
nav_groups:
  - primary
title: "Shared Regions"
video_id: 456ZmWbW3kQ
---
## Video Transcript

If you have some content that is repeated across your site then Perch shared content means your editor does not need to enter the same content for every page.

The contact details we created are not only displayed on the contact page, but in the footer of every page. Let’s make these a shared region so that by editing them once they will be displayed everywhere.
In the Perch admin select the Contact region from the homepage.
Go to the options for this region and set share across all pages, then hit save.

This is now a special shared region within Perch, in the list of content is is displayed separately to indicate to the editor that changing it will change it everywhere it is displayed and not just on the homepage.

Lets now add this contact region to another page. In your homepage index.php copy out the Perch tag for the Contact region and paste it into contact/index.php replacing the placeholder contact text in the footer there. Save the page and refresh it and you will see that the shared footer content appears immediately.

A careful use of shared regions can make editing a site far easier for the editors, with less need to duplicate information.