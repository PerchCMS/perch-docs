---
layout: video_youtube.html
nav_groups:
  - primary
title: "A contact details template"
video_id: YW43ozDtFhY
collection: video_getting_started
video_order: 7
duration: "7:01"
desc: Create a more complex template for the contact details on the site
---

We created a simple template already in an earlier tutorial. This time, we're going to create a more complex template for the contact details on the site. The page I'm working on is `contact.php` and I've already added the Perch runtime to this file. 

Then find the contact details section of the file, and copy this out to use as the HTML of our template. Copy this into a new file `perch/templates/contact/contact.php`.

We need to replace the hard coded content with Perch template tags, just like we did before.

One thing in this template is we have company name actually repeated twice. We can use a little trick here to save your editors typing the company name twice. If we repeat the tag twice, with the exact same ID, Perch will only show that template tag once. However, the content will display everywhere it is used.

We will also use conditional tags and the required atribute to make some parts of the address required and others optional. 

The email address can use the same repeating ID trick that we used earlier, in order to add the address to the `mailto` attribute and onto the page. The complete Perch template is below:

```html
<div class="vcard">
  <h2>Contact <perch:content id="company" type="smarttext" label="Company" required title></h2>
  <p class="fn org"><a href="/" rel="me"><perch:content id="company" type="smarttext" label="Company" required title></a></p>
  <div class="adr">
   <p class="street-address"><perch:content id="address1" type="text" label="Address Line 1" required></p>
  <perch:if exists="address2"><p class="street-address"><perch:content id="address2" type="text" label="Address Line 2"></p></perch:if>
  <p class="locality"><perch:content id="locality" type="text" label="Town/City" required></p>
  <p class="postal-code"><perch:content id="postcode" type="text" label="Postcode" required></p>
  <p class="country-name"><perch:content id="country" type="text" label="Country" required></p>
  <p class="email"><a href="mailto:<perch:content id="email" type="text" label="Email address" required>"><perch:content id="email" type="text" label="Email address" required></a></p>
<p class="tel value"><perch:content id="phone" type="text" label="Phone" required></p>
</div>
</div>
```

We can go to the `contact.php` page, delete the content and add our Perch region. Now we need to go into our browser and reload so Perch can pick up the new region. Then go to the Control Panel and select our new contact template. You can now add contact details via Perch.

