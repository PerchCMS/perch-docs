---
title: Example Form with Recaptcha Template
nav_groups:
  - primary
---

The recaptcha field requires to have Perch version 4.5 and above.

The following is a basic example of a contact form with fields for name, email address and a message and a captcha formula.

It can be used as a regular content template, with fields for both an introduction and a success message. It submits to the Forms app.

Due to the way the Google reCAPTCHA works, there are a number of configuration steps required before you will be able to fetch THE RECAPTCHA formula. These steps should only have to be followed once per site.

1. Go to [reCAPTCHA Admin console](https://www.google.com/recaptcha/admin/create)
2. Choose reCAPTCHA v2 type
3. Fill up your project details
4. Click _Submit_
5. Generates a _Secret_ key and a  _Site_ key 
8. Copy the two keys - this is what you're after
9. In your `config/config.php` add the following, adding your nice new SITE key and SECRET key

    `define('PERCH_reCAPTCHA_SITE_KEY', 'your SITE key');
    define('PERCH_reCAPTCHA_SECRET_KEY', 'your SECRET key');
    `
```html
<perch:form id="contact" method="post" app="perch_forms">

    <perch:content id="intro" type="textarea" label="Intro" textile editor="markitup" size="m">

    <div>
        <perch:label for="name">Name</perch:label>
        <perch:input type="text" id="name" required label="Name">
        <perch:error for="name" type="required">Please add your name</perch:error>
    </div>

    <div>
        <perch:label for="email">Email</perch:label>
        <perch:input type="email" id="email" required label="Email" placeholder="you@company.com">
        <perch:error for="email" type="required">Please add your email address</perch:error>
        <perch:error for="email" type="format">Please check your email address</perch:error>
    </div>

    <div>
        <perch:label for="message">Message</perch:label>
        <perch:input type="textarea" id="message" required label="Message">
        <perch:error for="message" type="required">Please add a message</perch:error>
    </div>

    <div>
        <perch:input type="submit" id="submit" value="Send">
		<perch:input type="reCAPTCHA" id="reCAPTCHA"  ></perch:input>
		<perch:error class="submit-error" for="submit" type="helper" >Check re-CAPTCHA</perch:error>

    </div>

    <perch:success>
        <perch:content id="success" type="textarea" label="Thank you message" textile editor="markitup">
    </perch:success>
</perch:form>
```
