---
layout: video_youtube.html
nav_groups:
  - primary
title: "Editing Content"
video_id: _HSjZcpIE7s
---
## Video Transcript

With Perch installed we can start to edit our first content.

I am going to make the introductory paragraph on the homepage editable.

Our site is currently .html pages I’m going to change them to .php as Perch requires pages to parse as PHP. If you want to keep a .html extension then look in the Perch documentation for our information about file extensions as on most servers it is possible to ask the server to parse .html pages as PHP too.

I can now link in the Perch runtime, using a PHP include. If you change the name of the Perch folder make sure this include is correct.

I then delete the homepage content and replace it with a Perch Region.

Save the page and reload it in your browser – the content will disappear.

Now log into the Perch admin.

You should find that your Home Page is now listed with the Intro Region that we just added flagged as New.

Go through to that Region and select the Text Block template. This is one of the predefined templates that Perch ships with – we’ll take a look at creating our own templates in the next video.

Click Submit and you can now add some content. The default template uses the MarkItUp Editor and Textile for formatting, you can instead choose to use a WYSIWYG editor or Markdown or enter HTML if you like.

Save the region, switch back to your site and reload and your content should be there. That’s all there is to getting started with Perch.
