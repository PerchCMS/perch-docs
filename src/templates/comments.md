---
title: Template Comments
nav_groups:
  - primary
---

Template comments can be used to annotate a template with notes for yourself and other developers. They are stripped from the template before being output to the browser.

```html
<!--* This is a template comment *-->
```

Template comments are just like HTML comments, but with the addition of an asterisk. Comments can span one or multiple lines.

When comments are removed they expand to encompass any whitespace around them, so care should be taken within whitespace-sensitive contexts like `<pre>` tags.
