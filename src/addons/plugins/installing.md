---
title: Installing Editors
nav_groups:
  - primary
---

Just about any WYSIWYG editor that takes over a basic textarea can be used with Perch. To make things simple, a few popular editors are pre-packaged for easy installation.

The currently available editors can be found in the [add-ons](http://grabaperch.com/add-ons/plug-ins) section of the Perch website.

To install, unzip the folder and place the plugin into the
`perch/addons/plugins/editors` folder. If you were installing the CKEditor plugin, for example, this would go into your site at:

```
perch/addons/plugins/editors/ckeditor
```

You then use the plugin in the same way that the default markitup editor is used, by adding it to a Perch [template tag](/docs/content/template-tags/). For example, if I had installed and wanted to use TinyMCE I would use the following in my template.

```html
<perch:content id="text" type="textarea" label="Text" editor="tinymce" html>
```

As most editors create HTML you need to set `html` on your region in addition to adding the editor attribute.

**Note**: If you are converting a default Perch template that uses the MarkItUp editor to use any of the other editor plugins – Redactor, TinyMCE or CKEditor you need to remove textile=“true” from the tag and replace it with html=“true”.

If you are not sure how to edit Perch Templates then first watch the video on [Creating Templates](/video/creating-templates/)

## Using a custom editor

If the editor you wish to use isn’t pre-packaged on our site, it’s still very easy to install. Place your editor’s files in a folder within
`perch/addons/plugins/editors`, for example,
`perch/addons/plugins/editors/myeditor`.

When you specify `editor="myeditor"` on a template tag, Perch will do two things

1.  Add a class of `myeditor` to the `textarea` field in the edit form
2.  Include the special file
    `perch/addons/plugins/editors/myeditor/_config.inc` at the end of the edit page.

The `_config.inc` file should include any HTML output needed to initialise your editor. Usually that will be links to its JavaScript and CSS files.

Within `_config.inc` you can use the special string `PERCH_LOGINPATH` as a placeholder to the path to the user’s Perch installation. This will be replaced with the real path automatically. This helps to make your plugin portable.

You should initialise your editor when the window loads, and also listen for the custom event `Perch_Init_Editors` on the `window` object. When this event is fired, you should initialise any new, uninitialised editors. It is called when a new block or repeater item is added.

A typical `_config.inc` file might look like this:

```html
<script type="text/javascript" src="PERCH_LOGINPATH/addons/plugins/editors/myeditor/myeditor.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  // function to set up uninitialised textareas
  var set_up_myeditor = function(){
    $('textarea.myeditor:not([data-init])').attr('data-init', true).myeditor();
  };

  // run the function
  set_up_myeditor();

  // listen for when the function needs to be run again
  $(window).on('Perch_Init_Editors', function(){
    set_up_myeditor();
  });
});
</script>
```

Here we are looking for any `textarea` with a class of `myeditor` that does not have the custom `data-init` attribute set. We then set that attribute and initialise the editor for that textarea. The custom attribute is used as a flag to prevent the same textarea being initialised more than once.

Perch uses the jQuery library on its pages, so if your editor has a jQuery adaptor or implementation, that’s the best version to use.
