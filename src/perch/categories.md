---
title: Categories
nav_groups:
  - primary
---

The Categories App is a core Perch App. It gives you a method of adding categories to any type of content across your site.

## Category Concepts

Categories live in a *Set*. If you want to categorize things by colour, you would create a set named “Colour” and then add categories (red, green, blue etc) to that set. You can have as many sets and categories as you like and these are added and managed from within Perch Admin.

## Category Templates

As with everything in Perch the information that is displayed on a category or set page is defined by a template. Templates live in `perch/templates/categories`. If you don’t have that folder, because you upgraded from a version of Perch older than 2.6, copy it from the latest download.

You can edit the default templates, or you can create your own. Find out more about the category template tags in the [Category Template documentation](/templates/categories).

## Page Functions

The Categories App includes functions to output lists of categories and individual categories.

See examples in the [Page Functions documentation](/functions/categories).

## More examples

Some example code to demonstrate how categories are used.

### Filtering perch_content by category

You can pass in a category or multiple categories when displaying content using perch_content_custom().

Find out more in the [filtering documentation](/perch/categories/filtering/).
