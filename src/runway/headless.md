---
title: Headless requests
nav_groups:
  - primary
---

The concept of a _headless_ CMS refers to a type of CMS where the system acts like a content API rather than serving pages. The presentation layer is completely skipped - no templates, no layouts, no real HTML like you'd expect from a web content management system. Instead, a headless system responds with pure data, often structured as JSON or XML.

Perch Runway 3 has the ability to respond to content queries in this way alongside it's regular operation serving web pages.


## Add-on compatibility

Individual add-ons need to hook into the headless infrastructure Runway provides to be able serve their content. More capabilities will be added as add-ons are updated.

|Add-on|Support|Capabilities|
|-|-|-|
|Blog|Yes|Posts, Comments|
|Shop|Yes|Products, Basket|
