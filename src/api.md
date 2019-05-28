---
title: API Documentation
layout: section.html
nav_groups:
  - primary
---

Perch and Perch Runway share a powerful API that enables you to extend, integrate with, and build on top of the Perch platform.

There are lots of ways for a developer to use the API, from light CSS and JavaScript additions, right through to building Perch apps. Below are some of the ways you can use the API.

Many of the more advanced API uses are implemented with the use of an App, so that's a good place to start for anything that appears after Apps in the list below.

## [Custom editors](/api/editors)

Want to add your favourite WYSIWYG editor to Perch? This is the place to do it.

## [UI customisations](/api/custom-ui)

Modify the control panel by adding in your own custom CSS and JavaScript in a way that shouldn't break when you update.

## [Language translations](/api/translations)

If you want to use the control panel in a language other than English, this is done with translations.

## [Authentication plugins](/api/auth)

When you need to manage your user accounts in an external system, authentication plugins enable you to do just that.

## [Field types](/api/field-types)

If you want to add new types of field to Perch control panel edit forms, this is how you do it. All edit fields in Perch are field types, from the basic single line text field, to more complex examples like maps and YouTube fields.

## [Apps](/api/apps)

When it comes to adding more serious functionality to Perch, you need an app. Apps can be anything from just a couple of quick files to listen for events (see below) to full scale applications built on Perch, such as Perch Shop. They can add pages the control panel, add runtime functions to the page, define custom templates tags and more. They can be powerful and complex, or almost nothing at all. If you want to hook your own code into Perch, an app is usally the route to do it.

## [Form validators](/api/validators)

The Perch public-facing forms have lots of basic built-in validation for common input types. When you need to apply custom logic to field validation, you can do that with a custom form validator. They enable you do to things like check an email address isn't already in use, or verify some input against an external API. Form validators are implemented with an app.

## [Event hooks](/api/events)

Many interactions that occur within the Perch control panel issue an event which your code can listen for. That might be when a page is published or an image is uploaded. Event hooks enable you to implement code in response to these interactions, such as invalidating a cache or optmizing an image. You can also issue events of your own for other developers (or other apps of your own) to listen for. Event hooks are implemented with an app.

## [Dashboard widgets](/api/dashboard)

The control panel has a dashboard page which is made up of small interface widgets. These typically give statistical or summary information and offer some quick links. You can add your own widgets with an app.

## [Template handlers](/api/templates)

Perch has a flexible tag-based templating language which can be augmented with custom tags. Template handlers can hook into each phase of template parsing to add custom functionality to templates. Template handlers are implemented with an app.

## [Search handlers](/api/search)

When a user performs a search on your website, each search handler is called in turn and can augment the search query and perform transformations on the results. If your app stores content in the database that needs to be returned through a site search, then search handlers are the way to do it. They are implemented with an app.

## [Bucket handlers](/api/buckets)

Uploaded assets are stored in resource buckets, which are managed through the user's bucket list. Perch has support for buckets on the local file system, whereas Perch Runway adds support for buckets on Dropbox, Amazon S3, CloudFiles and so on. You can add support for alternative backends using a bucket handler, implemented with an app.
 