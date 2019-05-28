---
title: Markup Configuration
nav_groups:
  - primary
---

Most of your markup is under your control in your templates. However in a couple of places Perch helps out by creating tags for you (form elements and images). In both cases we need to know if you are using HTML or XHTML syntax, and for forms we need to know if you want to use HTML5.

For images if we know you are using a Responsive Web Design (RWD) approach, we can omit height and width when creating an image tag.

## Markup

|Setting|Value|
|-|-|
|PERCH_HTML5|True or false. Defaults to HTML5 markup|
|PERCH_XHTML_MARKUP|True or false. Use XHTML-style markup syntax, specifically self-closing tags|
|PERCH_RWD|True or false. Presume a Responsive Web Design layout and omit e.g. width and height attributes on images.|
|PERCH_HTML_ENTITIES|True or false. If set to true, characters like smart quotes will be converted to HTML entities rather than unicode characters. Defaults to false, as UTF8 is presumed.|
|PERCH_STRIPSLASHES|True or false, default is false. If the inbuilt detection for when to strip added slashes is failing and you end up with backslashes escaping quotes in your content, this option will force them to be removed. Shouldn't ever be necessary, but included as a failsafe.|
