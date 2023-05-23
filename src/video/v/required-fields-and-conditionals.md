---
layout: video_youtube.html
nav_groups:
  - primary
title: "Required Fields and Conditionals"
video_id: YYXwvHjr1QU
---
## Video Transcript

In our home-slide.html I have added the required attribute with a value of true to the heading and body copy. This means the editor must fill these in.

I want to leave it so they can choose to add the subheading, images also cannot be made required as otherwise you would need to upload the image each time. However I don’t want to end up with empty tags if we do not have an image or subheading.

To solve this issue I use the simple Perch Conditional perch:if, this takes an ID attribute which has the same value of the item you want to check. For the subheading that is an id of subheading and for the image image.

If I remove the content from my subheading and save the form, then go back to my page and refresh I can see that the subheading is now able to be optional on the page.