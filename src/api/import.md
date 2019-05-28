---
title: Importing Content
nav_groups:
  - primary
nav_sort: 90
---

Perch Runway provides a number of APIs for importing content directly into the system and into supporting add-ons. This can be useful when migrating content from a different system or reading content from a file.

When migrating content between two systems, it's often easier to get data _out_ of the old system than to import that data into the new. That's not surprising, as content management systems are designed for outputting content. Reading content back in from a myriad of different formats can be quite a task.

This is the task we found ourselves facing when design the Runway import functionality. What file format should we teach Runway to interpret, and how should we able users to map that incoming data to where it needs to go inside Runway? Our first thought was if we supported one common data format, a developer needing to import content could first write the code to get their data into that format, and then import their file.

The more we thought about it, the less sense that made. Why write code to move your data to a file, and then have Runway read that file back and have you go through some other process of mapping the data to the right places? Why not just write code to push the data directly into Runway via an API? That way, if you can get access to your content in a PHP context you can push it directly into Runway, and if you can't, you just need to write the code to get that content into a format that _can_ be read back in a PHP context. Best case scenario is simpler, and worst case scenario is no worse.

For that reason we have these importer APIs rather than a single file importer.

You can import the following types of content:

## Page content

- [Collections](/api/import/collections/)
- [Assets](/api/import/assets/)
- [Categories](/api/import/categories/)

## Perch Shop 

- [Products](/api/import/shop/products/)
- Brands
- Countries
- Currencies