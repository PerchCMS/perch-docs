---
title: Editor plugins
nav_groups:
  - primary
nav_sort: 4
---

Perch content editing forms can be extended using [field types](../feildtypes), offering a lot of flexibility over how content is structured at collected from the user. The existing `textarea` field type can be enhanced to use any number of WYSIWYG editors should you require.

Just about any WYSIWYG editor that progressively enhances (or can be made to progressively enhance) a basic HTML textarea can be used with Perch. To make things simple, a few popular editors are pre-packaged for easy installation.

## Installing an existing editor plugin

The currently available editors can be found in the [add-ons](https://addons.perchcms.com/) section of the Perch website.

To install, unzip the folder and place the plugin into the `perch/addons/plugins/editors` folder. If you were installing the CKEditor plugin, for example, this would go into your site at:

```unix
perch/addons/plugins/editors/ckeditor
```

You then use the plugin in the same way that the default markitup editor is used, by adding it to a template tag that has ty[e="textarea"`. 

For example, if I had installed and wanted to use TinyMCE I would use the following in my template.

```markup
<perch:content id="text" type="textarea" label="Text" editor="tinymce" html>
```

As most editors create HTML you need to set `html` on your region in addition to adding the editor attribute.

**Note**: If you are converting a default Perch template that uses the MarkItUp editor to use any of the other editor plugins – Redactor, TinyMCE or CKEditor you need to remove `markdown=“true”` from the tag and replace it with `html=“true”`.

If you are not sure how to edit Perch Templates then first watch the video on [Creating Templates](/video/creating-templates/)

## Building a custom editor

If the editor you wish to use isn’t pre-packaged on our site, it should still be quite easy to install. Place your editor’s files in a folder within `perch/addons/plugins/editors`, for example,

```unix
perch/addons/plugins/editors/myeditor
```

When you specify `editor="myeditor"` on a template tag, Perch will do two things

1.  Add a class of `myeditor` to the `textarea` field in the edit form
2.  Find the special file
    `perch/addons/plugins/editors/myeditor/_config.json` and include any JS and CSS files specified in the page.

The `_config.json` file should use the following format:

```javascript
{
  "js": [
    "PERCH_LOGINPATH/core/editors/myeditor/jquery.myeditor.js",
    "PERCH_LOGINPATH/core/editors/myeditor/config.js"
  ],
  "css": [
    "PERCH_LOGINPATH/core/editors/myeditor/css/myeditor.min.css"
  ]
}
```

Within `_config.json` you can use the special string `PERCH_LOGINPATH` as a placeholder to the path to the user’s Perch installation. This will be replaced with the real path as the file is output. This helps to make your plugin portable between installations.

One of the JavaScript files you include will be the code to bootstrap your editor. You should initialise your editor when the window loads, and also listen for the custom event `Perch_Init_Editors` on the `window` object. When this event is fired, you should initialise any new, uninitialised editors. It is called when a new block or repeater item is added.

A typical bootstrapping JS file might look like this:

```javascript
var set_up_my_editor = function(){
  $('textarea.myeditor:not([data-init])').attr('data-init', true).myeditor();
}

$(window).on('Perch_Init_Editors', function(){
  set_up_my_editor();
});

set_up_my_editor();
```

The function is looking for any `textarea` with a class of `myeditor` that does not have the custom `data-init` attribute set. It then sets that attribute and initialises the editor for that textarea. The custom attribute is used as a flag to prevent the same textarea being initialised more than once.

Perch uses the jQuery library on its pages, so if your editor has a jQuery adaptor or implementation, that’s the best version to use.

## Editor configuration sets

You can pass configuration options from the template to the editor using the `editor-config` attribute on your template tag. The value of this attribute is substituted for the string `PERCH_EDITOR_CONFIG` in your `_config.inc` file.

```markup
<perch:content id="desc" type="textarea" editor="myeditor" editor-config="headings links">
```

It's then up to your plugin code to parse the string and use it however you see fit to configure your plugin.

*Note:* currently, as the configuration file is only include once per form, there is a limitation of the `editor-config` applying once. It's not possible to mix multiple editors with different configurations within the same form. You should probably think carefully about using multiple WYSIWYG  editors per form anyway, as they can be quite heavy.

## Custom configurations for default editors

Perch ships with three in-built editors: MarkItUp, SimpleMDE and Redactor. These are configured in a way that hooks them in with functionality provided by Perch such as Assets. You can, however, specify your own configuration. This is useful for adding additional toolbar plugins and so on.

To get started, enable custom configurations in your config file:

```php
define('PERCH_CUSTOM_EDITOR_CONFIGS', true);
```

When the editor is loaded, Perch looks for the file `addons/plugins/editors/config.js` and loads it.

This is an example for adding the `source` and `fontcolor` plugins for Redactor:

```javascript
Perch.UserConfig.redactor = function(){

  var get = function(profile, config, field) {

    if (config.plugins.indexOf('source') === -1) config.plugins.push('source');
    if (config.plugins.indexOf('fontcolor') === -1) config.plugins.push('fontcolor');
    
    return config;
  };

  var load = function(cb) {
    if (typeof jQuery.Redactor.prototype.source == 'undefined') {
      jQuery.getScript(Perch.path+'/addons/plugins/editors/redactor-plugins/fontcolor.js', function(){
        jQuery.getScript(Perch.path+'/addons/plugins/editors/redactor-plugins/source.js', cb);    
      }); 
      
    } else {
      cb();
    }
  };

  return  {
    'get': get,
    'load': load
  }

}();
```

Your code needs to define the `Perch.UserConfig.editorname` property as an object with two methods: `get()` and `load()`.

### The `get()` method

The purpose of this method is to return the configuration object that is used to instanciate the editor. Three arguments are passed in: 

- `profile` is the value of the `editor-config` attribute on the field
- `config` is the default configuration to reference or modify
- `field` is the input field

The method should return a config object in whatever format the editor needs. It can do this by modifying the one given, or by creating its own. In either case, be sure to return your new config.

### The `load()` method

The purpose of this method is to load in any files you need to support your configuration. In the case of a Redactor plugin, this method is loading in the plugin source file.

It takes one argument, a callback function, which you _must_ execute once your loading has completed.

If you don't have any files to load, just execute the callback and you're done.

