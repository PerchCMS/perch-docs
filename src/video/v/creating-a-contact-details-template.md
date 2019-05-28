---
layout: video_youtube.html
nav_groups:
  - primary
title: "Creating a Contact Details Template"
video_id: jGP6EeGQI-0
---
## Video Transcript

We’ve created a simple template already in an earlier tutorial. This time we’re going to create a more complex template, for the contact details on the site.

The page I am working on is `contact.php` and I’ve already added the Perch include to this page.

Find the area of the page that displays the contact details next to the map and copy this markup into a new file, saving it as `perch/templates/content.contact.html`

We can now add Perch template fields for each part of the address and contact information. I’m starting with the company name in the heading section, and on the next line that is repeated as part of the address. We can use a little trick here to save our editor needing to enter the company name twice.

The second time the company name appears, use the same ID that you used for the first company name field. Now the editor will only see one company field but the information will appear in both places.

Much of my address is required, however some addresses need two lines and some one for the main street address. I am wrapping the second address field in perch:if exists tags so that if it is not present we don’t get an empty paragraph element.

When adding the email address I use the same reusing the id trick as I did with the company name, to add the address to the mailto and also display it on the page.

With my template complete, I can add a Perch Region to the page, reload the page go to admin and complete my contact information to then see it appear on the contact page.
