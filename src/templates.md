---
title: Template reference
layout: section.html
nav_groups:
  - primary
---

Any content added by your content editors in the Perch Control Panel is managed by Perch Templates. The template defines both how things are displayed on the website and the forms that the content editor sees when managing their content. You have full control over both aspects.

This template reference details the variety of template tags available to you, for the various parts of perch and explains how templates work.

### Changes in Perch 3.1

Perch and Perch Runway 3.1 updated the template engine to support tags without a self-closing ` />` and to allow boolean attributes. This is to bring it more closely inline with how most people write HTML tags.

The changes are backwards compatible, so there is no need to update old templates unless you want to. The documentation here has been updated to use the newer syntax.

#### Example: tag closing

Template tags used to use XML-style self-closing tags. Before:

```html
<perch:content id="heading" type="text" label="Heading" />
```

This requirement has been removed. After:

```html
<perch:content id="heading" type="text" label="Heading">
```

#### Example: boolean attributes

Attributes used to always require a value:

```html
<perch:content id="intro" type="textarea" label="Introduction" markdown="true" required="true" />
```

This requirement has been removed. Now, if an attribute has no value, it is assumed to be `true`. After:

```html
<perch:content id="intro" type="textarea" label="Introduction" markdown required>
```
