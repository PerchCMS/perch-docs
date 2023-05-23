---
layout: video_youtube.html
nav_groups:
  - primary
title: "Template Tag Type Image"
video_id: 5DBdX9keQeU
---

## Template Tag Type Image


In this video we will take a look at the Template Tag type of image. Using this type means that your client can upload an image from their own computer and add it to the site.

A basic image tag just includes an id, `type="image"` and a label. This will trigger the Assets Pane in Perch and your client will be able to select or upload an image.

    <perch:content id="logo" type="image" label="Logo">

This would print out the path to the image, not particularly useful! What you are more likely to want to do is to display an image tag, in which case the Perch Template tag that creates the image should be added to the href of your image HTML tag. You can see this in our default image template. We also have an alt attribute with a Perch Text tag, so the content editor can create alt text for the image.

You probably don’t want editors to upload images at full size, so you can add width and, or height attributes. Perch will then proportionately scale the image if it exceeds those dimensions.

If you want to force a crop - perhaps to create a thumbnail at a certain size, set crop to true.

You can use the density attribute to create images for retina displays and also adjust image quality and add sharpening.

Any image manipulation, including resizing, requires that you have either GD or ImageMagick installed on your server. The Diagnostics Report in Perch will warn you if you do not.
