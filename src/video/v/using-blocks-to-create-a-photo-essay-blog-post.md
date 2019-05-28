---
layout: video_youtube.html
nav_groups:
  - primary
title: "Using Blocks to create a photo essay blog post"
video_id: -H4fT3xS22o
---
## Video Transcript

One of the things that has been traditionally hard to create is the photo essay type of blog post or content. As Perch Blocks is also part of the API, it’s available to the Blog App. In this video I’m going to show you how to create a beautiful photo essay post like this one.

As I want my images to be the star of this blog, I’m using a very simple CSS framework called Skeleton. It gives me a simple grid but requires that classes are added to my markup to make that grid work - it’s much like the Bootstrap Grid in that regard.

To make it easy to follow along, I have packaged up all of the files for this example.

You’ll need to get a copy of the Skeleton framework from get skeleton.com. You should have Perch 2.8 or greater installed plus the Blog App version 2.6 or up.

Then download the zip (if you are watching this embedded somewhere the files are attached to the video in the video section of the Perch documentation).

Pop the blog folder into the root of your site, make sure the paths to the Perch runtime and the css files for skeleton are correct. There is an additional stylesheet in the css folder.

I have also included the two blog templates we will be using, add these to perch/templates/blog then open them up in your editor.

Our master template for blog is post.html any fields that you want to edit have to be in this template. As I’m creating a photo essay blog my template looks quite different to a regular blog template.

I’ll explain some of the features I have added.

If I go to the Perch Admin and create a new blog post you can see our template has some fields available. A title, then there is a cover image. This will be a big image displayed at the top of the post with the title and date on top.

As we’ll have text on top I have added a selection of dark or light - this enables the user to choose to have dark or light text on their image and also sets an appropriate background color.

Then we have a subtitle and some introductory text. 

If we go back to the code we can see how this works.

Our dark and light selection is a template tag type of select, allowing the user to choose a class.
We then apply the cover image as an inline style on that cover div, it then contains the title, author and date information.

If you look at the bottom of the template I have reused the cover image id to make a smaller version to use in the post listing.

If we now look at the blog on the site you can see we already have the post in the listing, click through and there is the cover image and information.

Now we build up our essay.

Going back to the template you can see that we have opened a perch:blocks section.

Inside this I have four options.

- a full width image
- two images side by side
- image and text side by side 
- just a text area

You could of course offer as many options as you like. You can even use repeaters.

Back in admin I can just pick the blocks I want to use to build up my photo essay.

I can reorder them too.

Then take a look on the site and see how it looks.

Perch Blocks makes it really straightforward to create this kind of content entry - whether in regular perch content or in an App like Blog. 
