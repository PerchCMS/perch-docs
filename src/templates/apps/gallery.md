---
title: Gallery App
nav_groups:
  - primary
---

## Namespaces

The Perch Gallery App uses the namespace `perch:gallery`.

## Master templates

| Template | Used for |
|-|-|
| image.html | An image |

## Image versions and sizes

When an image file is uploaded to the gallery, it is processed to create
copies at different sizes. For example, this might be a ‘large’ version
to fit your site’s layout width and a thumbnail version to use for
navigation. These versions and sizes are defined in the `image.html`
template.

```html
<perch:gallery id="image" type="image" key="main"  width="640" height="480">
<perch:gallery id="image" type="image" key="small" width="100" height="100" crop>
<perch:gallery id="image" type="image" key="thumb" width="30" height="30" crop>
```

As you can see, a new image version can be created by adding a new tag
with the ID of `image`, and setting its width, height and crop
attributes in the way all images work in Perch templates.

A small difference with the Gallery templates is the `key` attribute.
This gives the version of the image a name by which you can refer to it
in templates. To take an example, if you wanted to output the path to
the small version of the image (which is resized and cropped to 100
pixels square) in a template, you’d use the code below, using the key as
an ID:

```html
<perch:gallery id="small">
```

To output the width and height of the image, you can append -w or -h to
the key to make an ID:

```html
<perch:gallery id="small-w">
<perch:gallery id="small-h">
```

To output a full image tag, you’d combine these:

```html
<img src="<perch:gallery id="small">" width="<perch:gallery id="small-w">" height="<perch:gallery id="small-h">">
```

You can add the name of the image by using the `imageAlt` item:

```html
<img alt="<perch:gallery id="imageAlt">" src="<perch:gallery id="small">" width="<perch:gallery id="small-w">" height="<perch:gallery id="small-h">">
```

If you wanted to output the main version (or any other version you’ve
added to your image.html template) just substitute its key in place of
small.

If you fail to specify a key for an image, Perch will create one for you
comprising of the width and height of the image version, e.g. w640h480.
It is recommended that you do specify your own key, however.

It’s worth remembering that these versions are created when the image is
uploaded. The more versions you create, the longer it will take to
process the upload and the more server memory and CPU you’ll require.

## Editing templates

The default templates are stored inside the `perch_gallery/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_gallery/templates/gallery` to `/perch/templates/gallery` and then make your changes.

If a template has the same name in this folder as the template in the `perch_gallery` folder it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template in the function’s options array.

### Adding fields to use in other templates

By default any field you add to the `image.html` template will appear on the page. If you just want to add a field so that it appears in admin
and may be used by another template then add the variable `suppress` to the field. It will then appear in admin to be completed by the user but not display when `image.html` is used.
