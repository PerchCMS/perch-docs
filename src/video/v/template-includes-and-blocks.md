---
layout: video_youtube.html
nav_groups:
  - primary
title: "Template includes and Blocks"
video_id: xwpCGDwdRLk
---
## Video Transcript

In this video we will take a look at using template includes to tidy up Blocks templates and reuse code.

If you are using Blocks you may find that your templates become very large as each perch:block is essentially a sub template.

Instead of having all of the code inside the Blocks template you can use a template include. This means you can reuse the same template inside and outside a Block - really useful if you use the same design patterns around your site.

I have a template here which has three different blocks in it, a two column layout, a media object with image on one side and text on the other, and a call to action.

I can make each of these a template include.

Template includes need a path from the root of the templates folder, so if you add your blocks templates to the content folder - in order to be able to use them outside of blocks you’ll seed to start your path with content I’ve then created a blocks folder and then the name of the template.

That’s all you need to do, you Blocks template will work in the same way but your code is cleaner and those templates are reusable in other blocks templates or just on their own.

You can also reuse templates in apps. As you probably know - templates for use in content use perch:content template tags and those used in apps use a tag namespace for that app - for example perch:blog.

If you were creating a blocks template for use in an App but wanted to be able to use your existing content templates then all you ned to is add the rescope attribute to your template include with a value of parent. When used in the Blog App the perch:content tags will be parsed as perch:blog.

