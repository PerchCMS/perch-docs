---
layout: video_youtube.html
nav_groups:
  - primary
title: "Template Tag Type Textarea"
video_id: eWZBuzQ4MOY
---

## Template Tag Type Textarea

In this video we are looking at template tags with a type attribute of textarea. You can see an example in the default Perch template `text_block.html`. While that template just has a single textarea field in it, more usually fields are grouped along with markup in a larger template, for example as seen in the default article.html template.

The texture type will create a textarea field in admin, to allow the editor to input larger amounts of content. This may also include them adding markup directly as HTML, as Markdown or Textile. You can also use a variety of WYSIWYG and other code editors on a textarea.

If you want to make sure your content editor completes this field set the required attribute to true.

If you want the value of this field to become the title of the field in the control panel, add `title`.

To change the size of a textarea in admin use the attribute size. For example if I set this field to have a size of xs, and reload the editor in the admin I get a much smaller content entry field.

The default Perch Templates use Markdown for formatting and the MarkItUp editor. I can remove the editor by removing the editor attribute.

Or I can put the editor back and switch to editing html with it by removing `markdown` and adding `html`.

The count attribute, if set to words or chars will show a count in the admin as the editor enters content.

There are some optional image attributes which only apply if you are using the default MarkItUp editor, Redactor or CKEditor. These editors support uploading images directly from within the editor.

So you can add `imagewidth="400"` for example and if the editor uploads an image larger than 400 pixels in width it will be scaled down. You can see the possible attributes [in the documentation](http://docs.grabaperch.com/docs/templates/attributes/type/textarea/).
