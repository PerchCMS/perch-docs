---
title: Multiple Item Regions
nav_groups:
  - primary
---

Repeating or Multiple Item Regions are Regions where you can add more than one item. So if you have a template that contains a title and some text the content editor could add as many of these items as they would like.

You can set up a Region to allow multiple items when you initially assign the template or you can check the **Allow multiple items**
checkbox in Region Options.

If an item allows multiple items then you will get some additional options under Region Options for that region.

There are two ways to edit a multiple item region in Perch. This reflects the different types of content they may contain.

## All on one page

If you check **Edit all on one page** in Region Options then you will edit everything on one page. This is best if the region contains only a couple of small fields – for example you are using it to manage a list.

## List Detail mode

The alternative is list detail mode. In this mode each instance of the region can be edited on a different page. When going to that Region the editor will see a list of the contents and click the one they want to edit. This is best for Regions that contain a fairly complex or large template.

In your site is is likely that you will have both modes in use for different templates.

If using List Detail mode there is an extra setting you can use for more complex templates. You can select any columns you would like to appear in the initial list to help the editor identify the correct item to edit. Set this up as the value for **Item list column IDs** in Region Options.

## Display

You can set some basic display options here, such as how the items should be sorted and whether to only display a certain number of items.

To get more control over the display of items take a look at [perch_content_custom](/docs/content/perch-content-custom/), however many regions on your site will be able to be displayed with these basic settings.
