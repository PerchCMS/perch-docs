---
layout: video_youtube.html
nav_groups:
  - primary
title: "Required Fields and Conditionals"
video_id: JrqH1ZC_w_Y
collection: video_getting_started
video_order: 5
duration: "2:41"
desc: We use the required attribute on any Perch template tags that we want to ensure are completed by the content editor.
---

We use the `required` attribute on any Perch Template Tags that we want to ensure are completed by the content editor, such as the heading and content on our homepage slide.

On the homepage slide we also have a subheading. We might not need to make editors add a subheading, but the problem is that if they don't we'll get these stray `h4` elements, as these wrap the template tag for the subheading.

To solve this issue, we use a perch conditional. We use perch if. This conditional takes an ID, which is the same as the ID of the content that you're checking for. We can add `<perch:if exists="subheading"></perch:if>` around our template tag. You can see these fields in the complete template here:

```html
<h3><perch:content id="heading" type="smarttext" label="Heading" help="This will form the clickable heading on the slide" required></h3>

<perch:if exists="subheading"><h4><perch:content id="subheading" type="smarttext" label="Subheading"></h4></perch:if>

<img class="border" src="<perch:content id="image" type="image" label="Image" width="520" height="520" crop>" alt="<perch:content id="alt" type="smarttext" label="Image description">">

<perch:content id="body" type="textarea" label="Body" markdown editor="simplemde" size="m" required>
```

These tags look a bit like HTML or XML tags, and are part of the perch template engine. Having added these required and conditional tags you ca reload the Admin and you will see that you are unable to submit the form for any required fields that are left empty. The subheading can be left empty, in this case if you view source you will see no stray empty heading elements.

This is a very simple way to make sure you don't end up with stray mark up in your template. A common thing to do would be to use a `perch:if`, around the image element, as if you've got the image `src`, and they don't upload an image, you're going to end up with empty image elements in your page.



