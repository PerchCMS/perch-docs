---
title: Image
nav_groups:
  - primary
---

Using `type="image"` will create an upload field so the administrator can upload an image from their own computer. By using the optional variables shown below you can specify resizing and cropping for these images giving you control over what is displayed on the page.

### Image upload attributes

|Attribute|Values and description|
|-|-|
|width|Integer. The maximum width allowed, in pixels. The image will be proportionally scaled down if the width exceeds the given value.|
|height|Integer. The maximum height allowed, in pixels. The image will be proportionally scaled down if the height exceeds the given value.|
|crop|True or false. Whether to crop the image to a fixed size. Requires both width and height to be set.|
|quality|Compression quality for uploaded images. Values are between 0 (very compressed) to 100 (top banana). The default is 85.|
|output|The information to output with the tag. Optional, and defaults to path. See below.|
|density|Integer. The pixel density of the image. Default is 1. A value of 2 would scale the image to 2x the dimensions given, but display the image at the size specified (e.g. for retina displays).|
|sharpen|0-10. The amount of sharpening to apply to images. Default is 4.|
|bucket|The name of a resource bucket to store the image files in.|

```html
<perch:content id="logo" type="image" label="Logo">
```

## Displaying images

It is important to note that if you simply use an image tag like the one above, this will print out the *path to the image* on your page, not a complete HTML image tag.

To create an image tag you would use this path in the src attribute of an HTML image tag, as shown below. I have also used an additional field with a type of text so that the administrator can add some alt text for the image.

```html
<img src="<perch:content id="logo" type="image" label="Logo">" alt="<perch:content id="logoalt" type="text" label="Alt text">">
```

## Changing image sizes in the template after upload

Perch resizes the images on upload when you add them to the site, therefore if you change the size of the images in your template you will need to re-upload the images to generate them at the correct size.

## Sharpening transparent PNGs

The underlying PHP GD image library does a bad job of applying sharpening to transparent PNGs, resulting in unpleasant edge artifacts. There's nothing Perch can do to fix this, it's an underlying weakness in that part of PHP. If you need to add transparent PNGs, you have two options for avoiding this issue:

1. Disabling sharpening with `sharpen="0"` on the template tag
2. Switch to using ImageMagick, which does a much better job

## Output options

As well as outputting the image path, you can use an image tag to output other types of information about the image. This is done with the optional `output` attribute.

### Values for the output attribute

|Value|Description|
|-|-|
|path|Default. The path to the image file.|
|w|The width of the image in pixels.|
|h|The height of the image in pixels.|
|size|The file size in bytes. Can be used with the format attribute (e.g. MB).|
|tag|Output a basic HTML image tag.|
|mime|Output the mime type of the image, if known.|

For example, to output the width of an image:

```html
<perch:content id="logo" type="image" label="Logo" output="w">
```
