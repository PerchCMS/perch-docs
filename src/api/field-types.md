---
title: Field Types
layout: section.html
nav_sort: 7
nav_groups:
  - primary
---

In Perch, every content template tag has a `type` attribute. This specifies which type of form field (or fields) are used to collect and process the data.

From text to textarea, checkbox to file, these all have different form controls and ways of handling the data. You can use the API to create your own field types.

## Why create a Field Type?

Take the map field type as an example. This goes beyond a basic form control. It asks for an address, and then uses the Google Maps geocoding API to turn it into a pin on a map. The map can then be zoomed and positioned to your needs. That’s just one example of how a field type can do a lot more than just collect some bare data and output it onto the page.

Perch has several [core field types](/templates/field-types/) which are listed in the documentation, however these can also be created as an add-on, and this is a fairly simple way to introduce custom functionality to Perch and Runway.

A field type is essentially just a PHP class. You must declare four main methods, then you are free to create whatever other functions you need for the custom functionality you are creating.

## How do I create a Field Type?

In Perch, every content template tag has a `type` attribute. This specifies which type of field is used to collect and process the data. Creating a field type is a simple way to start extending Perch as all you need to create is one PHP class that defines the fields needed to collect the data and the code to process it. 

The below example will show you how to create a simple field type that creates a list of the files you have uploaded to your Perch resources folder, enabling the editor to select one.

You can download a fully worked example below.

[Filelist Field Type example](https://static.grabaperch.com/docs/api/download-create-a-field-type.zip)

The example field type has been commented to explain what the main elements of the field type do. 

To use the field type open `perch/addons/fieldtypes` and put the folder `filelist` containing `filelist.class.php` into it. You can then use it like any other field type by specifying `type="filelist"` on a template tag.

As explained in the [API reference for Field Type](/api/reference/fieldtype), the class has four main methods:

|Method|Description|
|-|-|
|[render_inputs](/api/reference/fieldtype/render-inputs)| Renders the edit fields in the Perch control panel|
|[get_raw](/api/reference/fieldtype/get-raw)|Reads in the form data when submitted and processes it|
|[get_processed](/api/reference/fieldtype/get-processed)|Gets the data ready for templating|
|[get_search_text](/api/reference/fieldtype/get-search-text)|Formats the field value for the search index so the content of this field can be searched|

The above methods are detailed in the [API reference for Field Type](/api/reference/fieldtype) and the example `filelist.class.php` is documented to show how they work in practice.

The example also has a function `_get_files()`, this function is to enable the functionality of the field type, it looks in the `perch/resources` folder and returns a list of all files (if a file extension has not been passed to it) or a list of just those files that have a particular extension.

You can add as many functions as you need in your class as long as you also have those that are required by Perch.

You will generally find that you can use the core field types that ship with Perch, or the example from this page and then start to tweak it for your own purposes.
