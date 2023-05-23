---
title: Textarea
nav_groups:
  - primary
---

Textarea represents a multi-line block of text, and is edited with a textarea input field. You can use formatting languages with this textarea and also implement a variety of WYSIWYG editors via our plugin system.

The code example below would create a textarea using Markdown formatting and implementing the default editor for Perch, SimpleMDE.

```html
<perch:content id="body" type="textarea" label="Article body" markdown editor="simplemde">
```

### Attributes for type textarea

|Attribute|Values and description|
|-|-|
|textile|True or False. Whether to allow Textile formatting for the content.|
|markdown|True or false. Whether to allow Markdown formatting for the content.|
|html|True or false. Whether to allow HTML formatting for the content.|
|editor|The name of the JavaScript content editor to apply to the textarea. Set to `simplemde` to use the default editor.|
|size|A t-shirt size code for the size of the field: xs, s, m, l, xl, xxl|
|bucket|The name of the resource bucket to upload images and files into.|
|count|Set to `words` or `chars` to display a word or character count below the field.|

## Using editors

Perch ships with three editors.

1. SimpleMDE (`editor="simplemde"`) is a Markdown editor with some visual formatting. This is the default.
2. MarkItUp (`editor="markitup"`) is a Markdown editor without visual formatting. This was the default for Perch 1 and 2, and is kept for compatibility.
3. Redactor (`editor="redactor"`) is a WYSIWYG editor

We have also packaged some other popular WYSIWYG editors and these are available from the Add-ons section of the Perch website.

If using a WYSIWYG editor other than MarkItUp it is most likely that these will insert HTML, so you must make sure that you add the attribute `html` to your Perch Template Tag and remove the `markdown` or `textile` attribute if one is set.

Most editors support the resizing of uploaded images directly from the editor. If you want to use that functionality then set the following optional attributes on your tag.

### optional image upload attributes

|Attribute|Values and description|
|-|-|
|imagewidth|Integer. The maximum width allowed, in pixels. The image will be proportionally scaled down if the width exceeds the given value.|
|imageheight|Integer. The maximum height allowed, in pixels. The image will be proportionally scaled down if the height exceeds the given value.|
|imagecrop|True or false. Whether to crop the image to a fixed size. Requires both imagewidth and imageheight to be set.|
|imageclasses|A comma-delimited list of classes the user can apply to the image. (MarkItUp only.)|
|imagequality|Integer. Compression quality for uploaded images. Values are between 0 (very compressed) to 100 (top banana). The default is 85.|
|imagedensity|Integer. The pixel density of the image. Default is 1. A value of 2 would scale the image to 2x the dimensions given, but display the image at the size specified (e.g. for retina displays).|
|imagesharpen|0-10. The amount of sharpening to apply to images. Default is 4.|

Example:

```html
<perch:content id="body" type="textarea" label="Article body" markdown editor="markitup" imagewidth="300" imageheight="200" imagecrop bucket="news">
```
