---
title: Template Core Concepts
nav_sort: 1;
nav_groups:
  - primary
---

Whether using Perch, Perch Runway or one of our official apps you use templates to define the content that is entered in the admin Control Panel and then output to your pages.

## 1. Tag Structure

Tags are made up of two main parts – the tag itself, and the tag
*attributes*.

Take this tag:

```html
<perch:content id="title" type="text" label="Heading">
```

This is a `perch:content` tag. The fact that it starts with `perch:` lets us know that this is a tag that the CMS will process, and won’t be output to the page.

The second part, `content`, means that this is a general content tag, the most basic type of tag in Perch. Add-ons such as apps introduce new tags, and the name of the tag indicates which add-on will process it.

For instance, a `<perch:blog>` tag would be processed by the Blog app. A `<perch:members>` tag would be processed by the Members app, and so on.

(History lesson: Long, long ago, the *Pages* section in Perch used to be called *Content*. Technically, it’s the *Content app*, and that’s where the `perch:content` tags come from.)

### Attributes

Other than the tag itself, we have attributes. There are three required attributes: `id`, `type` and `label`.

Attributes control either how the tag behaves within the CMS, or how it is output to the page. Many different attributes can be used, and they’re listed in the [Attributes](/templates/attributes/) section.

## 2. Re-using content in the template

The `id` in a template tag identifies that content uniquely. Therefore if you want to use the same content in multiple places in your template, you can re-use the `id`. The administrator would only enter the content once despite in the output the content being displayed in more than one places.

An example where you might want to do this is with an email address. You want the admin to enter the email address once in the edit form, but display it on the page and also as the `mailto` of a link. The template for this would be as follows.

```html
You can email us at:
<a href="mailto:<perch:content id="email" type="text" label="Email address">">
    <perch:content id="email" type="text" label="Email address">
</a>
```

## 2. Namespacing

As already explained, templates for regular content in Perch, including Runway Collections, use a tag namespaced as `perch:content` and official apps define their own namespace. If you are working with a blog template you would use `perch:blog`.

In order to enable template reuse, it is possible to [rescope a template](/perch/content/templates/template-includes-rescope/) so that a template can be used in both content and an app.

## 3. Master Templates

It can be helpful to think of the main template used to input and display your content as a "Master Template". This concept is very clear in Apps - for example in the Blog App the Master Template is `post.html`. Any fields that you want to appear in admin for content to be entered need to appear in this template, even if they do not display when displaying a post.

For content created via regular Perch Content or a Runway Collection the concept is the same. The main template used for this content is the Master Template. Any content that you need fields for in the admin should be in this template. If this means that there are fields in your Master Template that should not be part of the output when this template is displayed you can use the [suppress](/templates/attributes/suppress/) attribute to prevent them being output.

## 4. Field Types  

When using any Perch Template tag the `type` attribute represents a Field Type. Perch ships with a large number of [inbuilt Field Types](/templates/field-types/) and you can also create your own via the [API](/api/field-types/).
