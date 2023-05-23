---
title: Creating an editor plugin
nav_groups:
  - primary
---

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
