---
layout: video_youtube.html
nav_groups:
  - primary
title: "Creating a Template"
video_id: _NZhJBSEzEY
---
## Video Transcript

In the last video we saw how easy it was to edit content on a Perch site using the default templates. However the power of Perch comes when you start to create your own templates with the exact mark-up needed in your site.

To demonstrate this we’ll create the slide area at the top of the homepage.

This uses some JavaScript to switch between the different panels however if we look at the source we can see that each slide is there marked up in the source.

We have a choice here, we could make this a multiple item region in Perch and allow editors to enter as many slides as they like – however this design doesn’t really scale to doing that so in this instance we will create three Perch Regions for the three editable areas, ensuring that the content editors don’t go crazy adding new sections. We’ll be converting repeated content in a later video though.

Even though we are going to have three regions, the actual template will be the same for all three, so we’ll create that first.

Copy out of one of the slides the mark-up and content so we know what we need in that template.

Paste it into a new html file and save that file into perch/templates/content as home-slide.html.

We now add Perch Template tags, as described in the Perch documentation, to make the various parts of this template editable.

For the heading I use the text type that will create a single line text entry field. I am adding some help using the help attribute so that editors know what this content is used for.

The sub heading is also a single line text type.

I have an image on my slides so I use the image template tag. I am also setting a width and height and the crop attribute to true so that the image will be resized and cropped. I then add a tag with type text for the alt text of this image.

Finally, I use a text area type for the body of the slide. As you can see I am choosing to use Textile as the formatting language and the MarkItUp Editor here. It is worth remembering that if you use Textile or Markdown, paragraphs will be wrapped in a paragraph element. I am removing the tags from the template so I don’t end up with double ones!

Save the file – that’s your template done.

Go back to your page and select the content inside each slide, deleting it and replacing it with a Perch Region.

Reload the page and go back to Perch admin. Select each of the new regions in turn and choose your new home-slide template, and add the content.

Your homepage now has simple, content managed slides.
