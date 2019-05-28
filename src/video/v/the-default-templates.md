---
layout: video_youtube.html
nav_groups:
  - primary
title: "The Default Templates"
video_id: _VRJcz48eq8
---

## Perch Default Templates

The default templates in your Perch downloads can be found in `perch/templates/content`. Take a look in this folder and you will see that templates are simply HTML fragments. They include Perch template tags and can also include HTML to markup the content entered in the Perch Admin.

The template doesn't just control how the content displays on the page, it also creates the forms used by content editors.

You can use these templates as is, you can edit them to use the HTML that you need, and you can create your own templates.

So if we take a look at the `text_block.html` template you can see that we use the textarea Perch template tag, with markdown flagged as true and the MarkItUp editor set as the editor. We've also used a couple of image attributes that will control the size of any image uploaded through MarkItUp.

If you look at the default template `article.html` you will see a much more complicated template with several Perch Template Tags and HTML markup. We'll cover these different tags in later videos but if you create a Perch Region and select this template you can see how the fields in the template have become the fields available in admin.

If you wanted to add an additional field to this template, for example the Job Title of the author. You would add it. Then go back to Perch Admin to see it appear.

One tip for working with templates, changes only happen to the website content if you reserve the content that uses the template. This is because we cache the output at edit time to keep your site nice and fast. So if you change some HTML in a template, go back to admin and hit save on the content before reloading your page to see the change.

