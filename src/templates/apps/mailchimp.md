---
title: Mailchimp App
nav_groups:
  - primary
---

## Namespaces

The Perch Mailchimp App uses the namespace `perch:mailchimp`.

## Master templates

The Mailchimp App is not used for creating data in the Perch Control Panel and so does not have a Master Template for data input.


## Template IDs

|Value|Description|
|--|--|
|`campaignSubject`| The subject line of the email|
|`campaignSendTime`| a datetime, can be formatted|
|`campaignArchiveURL`| the URL of the MailChimp hosted archive page|
|`campaignURL`| the URL of your local archive page as set up in Settings within Perch|
|`campaignText`| the text version of the email|
|`campaignHTML`| the HTML version of the email|
|`campaignSlug`| Perch generates this on import|

Other stored variables are available but you would not normally display these:

|Value|Description|
|--|--|
|`campaignCreated`|The date and time the campaign was created|
|`campaignSent`|number of emails sent|
|`campaignTitle`|the internal name of the Campaign on MailChimp and used in Perch admin|


## Editing templates

The default templates are stored inside the `perch_mailchimp/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_mailchimp/templates/mailchimp` to `/perch/templates/mailchimp` and then make your changes.

If a template has the same name in this folder as the template in the `perch_mailchimp` folder it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template in the function’s options array.

### Example: Simple Archive Template

```html
<perch:before>
  <ul>
</perch:before>
    <li>
      <h2>
    <a href="<perch:mailchimp id="campaignURL" type="text">">
    <perch:mailchimp id="campaignSubject" type="text">
    </a>
    </h2>
    <p><perch:mailchimp id="campaignSendTime" type="date" format="d F Y"></p>
</li>
<perch:after>
</ul>
</perch:after>
```
