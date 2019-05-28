---
title: Members App
nav_groups:
  - primary
---

## Namespaces

The Perch Members App uses the namespace `perch:members`.

## Editing templates

As with all Perch apps, the Members app uses templates. The default templates are stored inside the `perch/addons/perch_members/templates` folder, however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_members/templates/members` to `/perch/templates/members` and then make your changes. If a template has the same name in this folder as the template in the `perch_members` folder it will be used rather than the default.

You can also create your own templates with any name you like and pass in the name of the template when using the Members app page functions.

Any tag with `listing="true"` will be added to the member listing screen.
