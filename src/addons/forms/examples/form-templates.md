---
title: Example Form Template
nav_groups:
  - primary
---

The following is a basic example of a contact form with fields for name, email address and a message.

It can be used as a regular content template, with fields for both an introduction and a success message. It submits to the Forms app.

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
    </div>

    <perch:success>
        <perch:content id="success" type="textarea" label="Thank you message" textile editor="markitup">
    </perch:success>
</perch:form>
```
