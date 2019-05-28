---
layout: video_youtube.html
nav_groups:
  - primary
title: "Blocks"
video_id: MsgMhTFConA
collection: video_blog
video_order: 20
duration: "5:37"
desc: Give editors the ability to choose between different things to put into their content using Blocks.
---

In our blog template, the body of the post is just one big area to add text. Your editor, however, might want to build up a post with images, or video, or anything else. We can give them the ability to choose between different things to put into their post using **Perch Blocks**. And this works with any Perch Content, not just Blog. 

To create a Blocks section in a template, add a `<perch:blocks></perch:blocks>` tag pair. Then inside add your individual Block. Each ones is wrapped in `<perch:block></perch:block>` and is a kind of sub-template. We need to add a couple of attributes to the Perch block to identify it, we give it a `type`, which is anything you like really, just call it something that would identify it to you. So let's call this one just `text` and then give it a label, that's what will show up for the Admin to know what that kind of block is.

Inside the block you use your regular Perch template tags, whatever you want. For a text block you might just add a single Perch textarea tag, remember that when working inside Blog you need to use `<perch:blog` tags and not `<perch:content`.

The completed Blocks section for our post looks like this:

```html
<perch:blocks> 
  <perch:block type="text" label="Text">
    <perch:blog type="textarea" markdown editor="simplemde" id="text" label="Content" size="m">
  </perch:block>

  <perch:block type="figure" label="Figure">
    <figure>
      <img src="<perch:blog type="image" id="image" label="Image" width="800">" alt="<perch:blog id="alt" type="text" label="Alt text">">
      <figcaption><perch:blog type="smarttext" id="caption" label="Caption"></figcaption>
    </figure>
  </perch:block>
</perch:blocks>
```

Blocks mean you can add all of the markup you need around content. It's quite handy when working with something like Foundation or Bootstrap which require quite a lot of markup and classes added. The content editor can simply add the block they need and complete the content. You have already defined the markup that will enable it to look as they expect.

Having added blocks to the template, if you go back to the Blog admin you should see the Blocks selection toolbar appearing. Click on the text label to get a text area to fill in; click on the figure label to get a figure with the image, and alt text. You can add as many of these as you want.

Once Blocks have been added they can be rearranged by drag and drop.

This is a very nice way to give more flexibility to your content editors while still maintaining good control over the mark up that is output. At the point at which you want to redesign the site - or just add an additional class to some element for styling purposes. You can do that easily, something impossible if everything has been added and formatted as a big block of HTML in a WYSIWYG editor.

