---
layout: video_youtube.html
nav_groups:
  - primary
title: "A Contact Form"
video_id: SaxY6wNSxtk
collection: video_getting_started
video_order: 10
duration: "9:20"
desc: How you can use Perch to create this contact form.
---

The final part of our contact page is a form. I'm going to show you how you can use Perch to create this contact form. To process forms in Perch, you need to download the free Perch forms add-on from the Perch website.

Once you've downloaded the forms app and opened the zip, you can take the Perch forms folder, which is inside `add-ons/apps`, and place it into  your site, in `perch/addons/apps`.

Then open the file `perch/config/apps.php` and add `perch_forms` to the list so your file should now look like this:

```php
<?php
	$apps_list = ['perch_forms'
	];
```

In the Control Panel, you can see now that a new menu item has appeared. Visit the app, this will install it behind the scenes. 

Now open `contact.php` from your site files and, as we've done before, copy the HTML for the form from here. We can use that as our starting point as we create our template. We're going to need to create a new template under content, and we'll save that as `contactform.html` and copy in our markup.

The video walks through the creation of this template, you can see the full code below.

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

That's all of our form. We can now go back to `contact.php` and delete the markup that's now part of our template. Replace it with a Perch Region . Then reload the page so the form disappears, and reload the Control Panel. We've got our new contact form region showing up, so we can select our template. 

If you go to form options, you'll see you have other options here, you can give the form a different title, you can store the response. You can set a file upload path if people are allowed to upload information, for example if you're creating a form where people can Upload a CV. If you've got a functioning mail server, you can send the response via email. You can change some things about the email template as well. 

