---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the Forms App checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download and copy the perch_forms folder into `perch/addons/apps/`

Add `perch_forms` [to your apps.php file](/perch/getting-started/installing/apps).

When you next log into the Perch admin the Forms install script will run behind the scenes to create the necessary tables. A new forms navigation item will appear in the administration menu.

## Configuring a Form

The forms app can manage multiple forms. To get started you need to create and successfully submit a form. You will then be able to configure that form instance in the Control Panel by clicking on the Form in the list and selecting **Form Options**.

### Form Settings

A name for this form can be added here.

### Storing Responses

If you want to store the responses to this form in Perch, which will
enable you to download them as a csv, check the box. If your form has
the ability to upload files (for example a job enquiry form where users
can upload a CV) set the path for uploads here. This path should be
outside of your site root, so above your public\_html or www folder.

When storing data please remember this data is not encrypted. Please do
not store data such as credit card information or any sensitive data.
This would be a breach of your card processor agreement.

### Sending email

Perch can send the form responses including any attachments as an email. Check this box in order to send an email when the form is completed.

|Option|Value|
|-|-|
|Email Template|Pick a template from those you have created or select Plain text only|
|Email addresses|A comma separated string of addresses to send the response to|
|Email subject line|The subject of the email|
|Send from|A name the email will be from|
|Send from address|A valid email address that you can send from|
|Email address field|Select a field from the form that is a required field and validates as an email address|
|Email introduction text|Any text you would like to display before the information completed in the form|

### Autoresponse

If you check this box Perch will send an email to the person who completed the form as long as you have selected an *Email address field* in the *Sending email* Settings. The email can be plain text or use a template in the same way as the email to the site owner.

### Spam prevention

We would suggest using Akismet for spam prevention. You will need an Akismet account if you wish to do this, you can then enter your API Key here.

### Redirection

The default behaviour of forms is to remain on the same page and show your thankyou message. If you would prefer the user be sent to a separate thankyou page, enter the URL here.
