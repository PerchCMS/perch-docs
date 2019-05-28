---
layout: video_youtube.html
nav_groups:
  - primary
title: "Editing the Blog Templates"
video_id: c_7H5x13KPE
---
## Video Transcript

To add the finishing touches to our blog we need to edit the templates. As with anything in Perch the output HTML is down to you. When editing templates for any official app you should start by making a copy of the app default templates and placing them into your perch/templates folder. Perch uses the default templates but if there is a template of the same filename in your folder it will use that one first.

By copying your templates rather than editing the default ones directly, we won’t overwrite your changes when you upgrade.

So copy the folder `perch/addons/apps/perch_blog/templates/blog` to `perch/templates/blog`

Another concept to understand about app templates is that every app has a Master Template. This tends to be the one for the detail page of the app. In the case of blog this is the template that displays an individual post – post.html. Any fields that you want available to other views – such as the listing – must appear in this template. As this is the template that generates the admin view and therefore the fields the editor completes.

As post.html is the master template we will start by editing it.

You can add or remove any markup here and also add additional fields.

In our design we use the excerpt as an intro to the post. In the default templates however excerpt does not appear on the detail page, it’s only used for listings. You can see it is down at the bottom of the template outside of the HTML markup and has an attribute suppress=“true”. The suppress attribute is how you add additional fields to your Master Template for the editor to complete without them displaying in that view on the website.

We want to display our excerpt so I move it into place and remove the suppress attribute.

I’m removing the image field as we aren’t using it in this design. The second field down the bottom would create a cropped version for the listing – again if you need multiple image sizes they all need to be listed in this template.

At the bottom of the page things look pretty good. My name is displayed there as part of the author credits section, I don’t want that in this design so I need to switch to my post.php page and remove the function that calls that in.

You can also see on post.php the functions that add the comments listing and form to the post. If you don’t want comments at all you could remove these. We do have comments so I need to update the comments template so that is looks like our design.

The comments template is comment.html

Comments are really just like any repeating content in Perch. If you look at the very top of the template there is a section wrapped in perch:before tags – this will output before the comments are displayed, at the bottom the content with perch:after tags will display after the final comment.

Finally we edit the listing template which is post-in-list.html this should be looking familiar to you now – once again we have perch before and after sections enclosing the list.

You can tweak and adjust your templates until you are happy with the output.

With your templates updated the blog is ready to go.
