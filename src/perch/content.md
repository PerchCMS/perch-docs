---
title: Working with Content
layout: section.html
nav_groups:
  - primary
---

Content Management Systems are for managing content, so this section of the documentation contains information about how Perch manages content and provides example code for some common scenarios.

## Templates

If you have followed the Getting Started Guide, you will know that making an area on your page editable happens by putting a PHP function `perch_content()` onto your page, then selecting a template for that Region in admin. The template you chose defined the fields that display in the Control Panel for that Region, as well as the output.

Our default templates are just a starting point, you can edit them and create your own. [Find out more about templates here](/perch/content/templates).

## Page Functions

The `perch_content()` function is the function you will use most often if you are making a simple site editable, however if you need to reuse content or want to filter and sort content there are other functions hat you can use. Our official addons also define their own functions. [Find out more about functions](/perch/content/functions).
