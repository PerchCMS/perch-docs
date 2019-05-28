---
layout: video_youtube.html
nav_groups:
  - primary
title: "Using perch_content_custom"
video_id: LxenczeJ9Ho
---
## Video Transcript

On our homepage is space for two testimonials. Something you might like to do is to have a whole list of testimonials and display two at random on the homepage as an easy way to make the site a bit different each time someone visits.

I’ve decided to create a testimonials page that lists all of my testimonials using similar markup to what was used on the Team page. I have created a testimonial.html template and used that as the template for a testimonials Region added to the testimonials.php page. I have added three testimonials so far.

On the homepage I want to display two of the testimonials at random. I also need to use different mark-up to the mark-up used on the testimonials page. This is where perch_content_custom() is helpful.

First, I am going to create a second template using fields that have the same names as in my existing testimonial.html and saving it as _home_testimonial.html – starting a template with an underscore will hide it from the list when setting up a new region, handy for templates only used with perch_content_custom.

I can now go to the homepage, and replace the testimonials with a region using perch_content_custom. I give the region the same name as the Region on my testimonials page, then pass in an array of options.

I need to tell Perch which page to get the testimonials region from – testimonials.php.

Specify my new template.

Set a field to sort on and set the short-order to RAND, which will sort randomly.

Then set a count of 2 as I want two items.

Save this and refresh the page, refresh it a few times to see different content load.

You now know how to use perch_content_custom to pull content from another page and display it with different markup. This can be a very flexible way to add content to your site.
