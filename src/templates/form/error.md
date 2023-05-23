---
title: perch:error
nav_groups:
  - primary
---


Perch forms allow for comprehensive and customizable error reporting using the `perch:error` tag.

You can have multiple perch:error tags for a perch:input field to cover different error states. For example one message to display in the case of a required field not being complete and a second error to display if the field is completed but the wrong format is used where you are validated email addresses for example.

The tags can be anywhere within your perch:form tags. So you can display errors adjacent to the relevant fields or at the top of the form as required by your design.

In the example below I have used a span with a class of error inside my tags – this html and the messages is completely in your control, anything inside the error tags will be displayed when an error occurs.

## A simple example

The below shows an error to be displayed when a required field is not completed.

```html
<perch:error for="message" type="required">
  <span class="error">Please add a message.</span>
</perch:error>
```

## Formatting errors

Many of the form types require data to be submitted in a particular format. For example type=“email” required the input to be a valid email address. You can use perch:error with a type of format to catch these errors and show helpful error text.

The below catches an incorrectly formatted email address.

```html
<perch:error for="email" type="format">
  <span class="error">Please enter a valid email address.</span>
</perch:error>
```

You can have multiple perch:error tags per field, so you may want to have one to display when the field has not been completed and another to catch the incorrect format.

## Catching incorrect file uploads

Perch allows you to set which types of files may be uploaded. If a user tries to upload a filetype that is not allowed then you can catch this.

There is also a fileupload type which can be used to catch when a fileupload fails.

```html
<perch:error for="cv" type="filetype">
  <span class="error">File must be a PDF or Office document.</span>
</perch:error>

<perch:error for="cv" type="fileupload">
  <span class="error">Couldn't upload the file - could be too big.</span>
</perch:error>
```


### perch:error attributes

|Attribute|Description|
|-|-|
|for|Required: ID of a perch:input tag|
|type|Required: the value should be one of the following: required, format, filetype or fileupload|

## General error states

Sometimes it’s useful to display a general failure message if the form did not pass validation. For example, you might want to display a message at the top of a longer form to indicate to the users that they should scroll down and look for problems on individual fields.

You can do this with a ‘general’ error for all fields:

```html
<perch:error for="all" type="general">
    Sorry, something went wrong and the form was not sent. Please see the messages below.
</perch:error>
```
