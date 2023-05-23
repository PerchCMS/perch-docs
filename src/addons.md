---
title: Addons Documentation
layout: section.html
nav_groups:
  - primary
---

This section of the documentation contains specific documentation for our first party add-ons to Perch - Apps, Plugins, Dashboard Widgets, Feathers, Translations and Field Types.

## Perch Add-ons 101

We try to keep the core of Perch and Runway light, then offer additional functionality by way of our add-ons. This means your content editors don't have to wade through unwanted functionality to edit their site. Add-ons which expose additional template tags or functionality behave as much as possible in a consistent way to the rest of Perch.

You will find sections for each add-on that exposes functions in the [Functions](/functions) reference, and add-ons which expose additional template tags can be found in the [Apps section of the Template Reference](/templates/apps), refer to these as you create templates and pages to use with an add-on. The pages in this section of the documentation include example code and other information about using add-ons.

### Types of add-ons

- **Apps**: these are the bigger pieces of functionality such as Blog or Shop. Most Apps add additional Control Panel functionality and then functions and template tags for output to your site.
- **Plugins**: you can add alternate WYSIWYG editors to content areas by way of a plugin
- **Dashboard Widgets**: the Perch Dashboard is extensible so you can add additional functionality here.
- **Feathers**: a method of packing front-end code for inclusion in your site.
- **Translations**: the entire Perch Control Panel can be translated, add a translation so your content editor can work in their own language.
- **Field Types**: these add additional template tag _types_ which you can then use when creating templates.

### Installing add-ons

Depending on the add-on installation may be as straightforward as dropping a file into your Perch install, or may have a number of steps to follow. Check the individual add-on pages for details.

Add-ons which create database tables will manage their installation for you, typically you need to go to the add-on page in the Control Panel and installation will be run.

### Updating add-ons

As with Perch itself, we try to keep add-on updates as simple as replacing the add-on folder in your Perch install. It is always worth checking the update notes however just in case there is something more that needs doing such as a template update.


### Creating your own add-ons

All of the official add-ons have been created using the public Perch API. If there is something you want to add to Perch you can use that API to create your own functionality. Take a look at the [API Documentation](/api) to get started.
