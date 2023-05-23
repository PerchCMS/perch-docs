---
layout: video_youtube.html
nav_groups:
  - primary
title: "Creating a Perch Template"
video_id: I9hVhNOndUg
---

## Creating a Perch Template

To get the most out of Perch you will soon want to create your own templates. In this video we will have a look at some of the basic concepts.

Any HTML file that you save into `perch/templates/content` is made available when setting up a Region in Perch.

I am building a site using a free theme from Start Bootstrap. At the bottom of each page is a set of social media links. I want the content admin to be able to add their own urls, but to keep control of the markup around them as it uses special classes.

Copy the entire block of markup into a new file, save it into `perch/templates/content` as social.html.

The value of the `href` for each link is the hash symbol currently, we want to use a Perch tag to allow the admin to add their own link. The first is for Twitter, we add:

    <perch:content id="twitter" type="text" label="Twitter link">`

Do the same for Facebook, editing the id and label:

    <perch:content id="Facebook" type="text" label="Facebook link">`

And the same for GitHub.

    <perch:content id="github" type="text" label="GitHub link">`

Save the template. Replace the content that is now part of a template with a Perch Region.

Reload the page. In the Perch Control Panel find your new region and select the social template. You can now edit your social URLs, save them and see them live on a page.
