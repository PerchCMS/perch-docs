---
title: Fundamental ideas behind Perch
nav_groups:
  - primary
---

Perch has a fairly opinionated set of core values and fundamental ideas behind it. Understanding _why_ we have made certain choices in Perch architecture can be helpful as you begin to use Perch, especially if you are coming from another solution.

## Perch Templates become the schema for your content

Perch is based around structured data, you define the type of data you are collecting when you create a template for content.

## PHP goes in your pages, Perch template tags in your templates

If you are using a Perch Page Function, or some other PHP then this needs to go in the pages of your site. PHP will not be parsed in templates.

If you try and add a Perch Template Tag anywhere other than in a Perch Template file then it won't be parsed, and you will see Perch tags in your HTML when you View Source.

## Everything has a Master Template

As your templates define the schema, any chunk of content needs to have a template that is used to define the data you want to collect. If using a regular Perch Region then this is the template that you select when creating the Region. You can use other templates to display part of that data, or to display the data with different markup but all of the fields that you want to use must be defined in the main template used for that content.

## We prioritize structured content over a WYSIWYG "pit"

Perch is very flexible in terms of the editing environment. If you want to use a WYSIWYG editor then you can do, however we promote the creation of structured content rather than each page just being a big text input with an editor. When you use structured content this gives you a huge amount of flexibility to redisplay that content.

A simple example being that on one page you might display a heading as a level 1 heading, and when you display it elsewhere, perhaps as an excerpt you want to use a level 3 heading. If the data is all in a WYSIWYG generated block of HTML it is very hard to do this. If you have stored the data as a title for the content, then whenever you display it you can decide which markup to use as needed.
