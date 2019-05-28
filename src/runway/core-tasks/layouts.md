---
title: Layouts
nav_groups:
  - primary
---

Master Pages can make use of Layouts for drawing in common reusable page fragments like headers, footers, sidebars and so on.

Layout files are PHP partials, rather than templates, and are designed to work as extensions to Master Pages for code reusability.
They are intended to be as flexible as possible in use, so your layout files can be structured in whatever way best suits your site.

Often, this results in layouts being used for the structure of the page around your content (things like the opening `<html>` and `<head>` sections of a page, and the corresponding closing sections at the bottom), as well as reusable components within them (like navigation components, sidebar modules and the like).

Layout variables enable you to pass parameters to a layout as it is called, in order to control content within it or change how it behaves.
