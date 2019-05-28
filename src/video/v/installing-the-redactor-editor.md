---
layout: video_youtube.html
nav_groups:
  - primary
title: "Installing the Redactor Editor"
video_id: eL6QnACv04I
---

## Installing Editor Plugins

Perch ships with an editor called MarkItUp. This is a great editor if you like to edit your content with Markdown, Textile or in HTML.

If you would prefer to use a WYSIWYG editor plugin however, you can, and we have even prepackaged some of your favourites for you - Redactor, CKEditor and TinyMCE. In this video I’ll show you how to install and use Redactor to edit content on your site.

Download the Redactor Editor from the Perch Addons Directory, unzip the download and place the redactor folder into `perch/addons/plugins/editors`.

You can then use Redactor on any textarea field, in Perch Content or in an App like blog.

If we take the default text block template in Perch Content you would change this to use Redactor by setting html to true and adding editor=“redactor”. It’s important to remember that these WYSIWYG editors insert HTML, which is why you need html=“true” on the tag.

Now when you go to administer a page that uses this template you will have the Redactor editor in place.

Redactor supports the special image attributes that are specified in the documentation and can also upload files to resource buckets.
