---
layout: video_youtube.html
nav_groups:
  - primary
title: "Contact Form Error Messaging"
video_id: WlrCRkXoYIM
collection: video_getting_started
video_order: 11
duration: "6:17"
desc: We can use Perch forms to create clear error states for our forms.
---

In the last video in this series, we created a form with a success message. However, if you try and submit the form without completing all the required fields it's going to reload, which isn't very friendly. We can use Perch forms to create clear error states for our forms.

Now I want to do two things here; I want to flag up some fields as being required, and show an error message. In addition to showing the message I display a background colour on the div that wraps the label and field, by adding a class to that element. 

## Showing an error message

We can start by using the `<perch:error></perch:error>` tags to display an error message below any incorrectly completed fields.

The tags are a pair, with opening and closing tags, between the tags you can add your message and any markup needed to display it. We need to say which field the error message relates to, and also which error state. For the `name` field we want to check that the field has been completed, therefor the `type` attribute is set to `required` and the `for` attribute to `name`. In order for the error to be thrown we need to have `required` to the input field.


```html
<div>
  <perch:label for="name">Your name:</perch:label>
	<perch:input id="name" type="text" required label="Name">
    <perch:error for="name" type="required"> 
    <p class="about-error">Please enter your name</p>
    </perch:error>
</div>
```

For the email field we would like that field to be both required AND contain a valid looking email address. To do this we use two sets of `perch:error` tags. The first checking for the type of `required` and the second for a type of `format`. 

```html
<div>
	<perch:label for="email">Your email:</perch:label>
	<perch:input id="email" type="email" required label="Email">
    <perch:error for="email" type="required"> 
    <p class="about-error">Please enter your email address</p>
    </perch:error>
    <perch:error for="email" type="format"> 
    <p class="about-error">Please enter a valid email address</p>
    </perch:error>
</div>
```

I mentioned that I also want to add a class when there has been an error. To do this you reuse the `perch:error` tags - this time to wrap the class. You can see this in the completed contact form template below.

```html
<h2><perch:content id="heading" type="text" label="Heading" required></h2>
<perch:form id="form-contact" method="post" app="perch_forms" role="form">
  <div class="input<perch:error for="name" type="required"> error</perch:error>">
	<perch:label for="name">Your name:</perch:label>
	<perch:input id="name" type="text" required label="Name">
    <perch:error for="name" type="required"> 
    <p class="about-error">Please enter your name</p>
    </perch:error>
</div>
<div class="input<perch:error for="email" type="required"> error</perch:error><perch:error for="email" type="format"> error</perch:error>">
	<perch:label for="email">Your email:</perch:label>
	<perch:input id="email" type="email" required label="Email">
    <perch:error for="email" type="required"> 
    <p class="about-error">Please enter your email address</p>
    </perch:error>
    <perch:error for="email" type="format"> 
    <p class="about-error">Please enter a valid email address</p>
    </perch:error>
</div>
<div class="input<perch:error for="message" type="required"> error</perch:error>">
	<perch:label for="message">Your message:</perch:label>
	<perch:input id="message" type="textarea" required label="Message">
    <perch:error for="message" type="required"> 
    <p class="about-error">Please enter your message</p>
    </perch:error>
</div>
<perch:input type="submit" id="submit" value="Send">

<perch:success>
<div class="alert success">
<perch:content id="success" type="textarea" size="m" label="Thank you message" markdown editor="simplemde" required>
</div>
</perch:success>

</perch:form>
```



