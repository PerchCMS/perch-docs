---
title: Field Types
layout: section.html
nav_groups:
  - primary
---

Field types are literally the _types of field_ that can be added to an edit form within the Perch control panel. The `text`, `date` and `image` types are all examples of this. Field types either provide a different set of input fields, a unique way of processing that input, or sometimes both.

Perch ships with a wide range of default field types, but more can be created and implemented as add-ons. (If you're thinking about building your own field type, [check out the API](/api/field-types/).) Some of those field types are build as first-party add-ons, and are documented here.

## Installing a field type

Adding a field type to Perch is very easy. Field types live in the `perch/addons/fieldtypes` folder. When you download a field type, it will be in a folder. Place that folder into `perch/addons/fieldtypes`.

Each individual field type may then have further steps needed to configure it, so you should follow the field type's dedicated instructions too.
