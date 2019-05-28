---
layout: video_youtube.html
nav_groups:
  - primary
title: "Reuse an ID in a Template"
video_id: NrTMYeArrAQ
---

## Reusing an ID in a Template

In HTMl pages it isn’t valid to use an ID more than once. In Perch templates however you can do this. By reusing an ID, you can reuse the content entered for that ID and your content editor won’t have to add it twice.

A really simple example of this is where you want to output an email address that is also clickable and opens up the visitor’s email client.

To do this the HTML you need to have is this.

    <a href="mailto:hello@grabaperch.com">hello@grabaperch.com</a>

In a Perch template, you would add the first email field.

    <a href="mailto:<perch:content type="text" id="email" label="Email address">">hello@grabaperch.com</a>

Then just copy and paste the Perch template tag into the place where the email address is repeated for display on the page.

Now in the Perch Control Panel we can see that we only have to enter the email address once, on the page however we have our email address displayed but also clickable with the mailto link.

Repeating the ID becomes very useful when dealing with images in Perch. Sometimes you will want to add an image and get Perch to generate multiple sizes. Perhaps to show a thumbnail on the listing and click through to a larger image.

You can reuse an image ID, and then add different height, width and crop attributes. Perch will then only ask for the image to be selected or uploaded once - but will generate images for each size you need.

Remember to add `suppress` to any image you don’t want to immediately display on that page.