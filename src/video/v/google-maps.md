---
layout: video_youtube.html
nav_groups:
  - primary
title: "Google Maps"
video_id: u1fR1-wvHH0
---
## Video Transcript

On our contact page we have a Google map showing the company location. Perch makes it very easy to add a Google map to your site.

Add a new Perch region to the page, replacing the map content. Give this region a name of map. Save the file.

Perch ships with a default map.html template – we’ll need to edit that slightly so that the end results looks like the map on the design. Open perch/templates/content/map.html

I am removing the h2, giving the div a class of frame as my CSS can then style it like the original iframe and setting the width of the map tag to 560×300 pixels. The map perch content tag is what will give editors an interface to browse for and set a map location. Save this file.

Refresh the contact page in your browser.

Reload the Perch admin to see the new Map region.

Click on this and select the Map template.

You can now browse and choose a location on the map. Save this form.

Return to your site and the map will appear. The map also uses the static map API so if a visitor does not have JavaScript they will still get a static map tile set at the correct location.