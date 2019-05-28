---
layout: video_youtube.html
nav_groups:
  - primary
title: "Introduction to Blocks"
video_id: W53oxaZkWcQ
---
## Video Transcript

In this video we will take a look at how to use Perch Blocks. This is a feature of Perch and Perch Runway introduced in version 2.8 so make sure you are running 2.8 or greater before getting started.

Sometimes it is useful to allow content editors to select from a range of templates. Creating a free form content area that can contain text, a media object with image and text alongside, a video, or a three column structure. It is here that Blocks come in useful.

I’ve got a page here based on the Skeleton CSS framework. This is a lightweight framework that has a grid system much like the one in Bootstrap that requires adding divs and classes to your markup.

Without Blocks I would need to be proscriptive about which layout the editor could use where. With Blocks I can give them the choice. Let’s take a look.

I want my freeform area to be where I have the three rows of placeholder content, so I copy that out and paste it into a Perch template named freeform.html - that’s saved into `perch/templates/content` as usual. I now need to turn each area into an editable template.

I’m just adding a textarea here, if I wanted to be sure they added a heading I could add separate tags for heading and content.

So this is just creating a template as usual, however if we selected this template the editor would have to fill in all of the fields, in the order they are in the template.

So we can now make this a Blocks template.

We wrap the whole template in a `<perch:blocks>` tag pair. 

Then each of these rows I will make a Block, by wrapping them in `perch:blocks` tag pairs.

Each perch:block tag pair requires two attributes ‘type’ which is an ID like reference to allow you to refer to the block in templates.

I’m going to add this tp my three blocks now.

I also need to add a label - this should be a short, human readable label for the block. It will show up in admin.

I save my template then go back to the original page and add a Perch Region.

I reload the page in the browser then go into the Perch Admin and choose my new template.

You can see we now have a region with no available fields to fill in but a selection of the three labels we gave our blocks.

I can now build up the page.

I’m first going to add a 2 column block.

If I save this and go back to the page you can see how this looks.

You can drag Blocks to reorder them.

This is a single item region but you can use Blocks within Multiple Item Regions. You can also use Blocks in Perch Add-ons - such as Blog.
