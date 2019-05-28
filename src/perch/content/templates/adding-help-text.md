---
title: Adding Help Text
nav_groups:
  - primary
---

**How do I add help text to the Control Panel**

You would like to add some information to help your content editors use the edit forms.

We've tried to make it possible for you to really guide your content editors through their use of Perch. One way is to add help text to edit forms and individual fields.

To add a block of help text at the top of an edit for use the perch:help tag.

```html
    <perch:help>
    <p>Any amount of HTML-formatted help can be specified here, including images and links if required.</p>
    </perch:help>
```

To add help next to a certain field use the help attribute on that field.

```html
<perch:content type="text" id="heading" label="Heading" help="Give the article a descriptive title">
```

Adding help text in this way can really aid in enforcing the content strategy for your site.
