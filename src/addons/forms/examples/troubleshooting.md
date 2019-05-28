---
title: Troubleshooting
nav_groups:
  - primary
---

When dealing with forms there are various places where problems can arise. A logical approach to troubleshooting will help you work through the likely causes.

## My form doesn't display in admin

First, check that you have correctly added the app to your `config/apps.php` file as described in the installation documentation.

If your form does not appear in admin make sure that you have successfully submitted it and **seen the success message**.

A common reason for a form not appearing is that you have a required field without an error message so your form does not submit successfully.

### Create a reduced example

A complicated form can very easily have a syntax error, causing it not to submit properly. If you cannot get your form to show up in admin reduced it right down to a single text input field and submit that. That will help you isolate whether the issue is an installation problem with the Forms App or an issue with your template.

## Emails are not being sent

With any mail problem your webhost should be your first contact after following these steps, there is a not a lot we can do in Perch Support to help. If you don't understand what you are advised my your host then do post to the forum, but for us to be able to help you need to get past the point of this being a mystery!

The following troubleshooting steps should be followed:

First, confirm that email can be sent from the email test under Settings. If this does not work then Perch cannot send email **at all**. Get your email working before moving on to troubleshoot your form.

If email is generally working:

- Ensure you have set a Send from address
- If you have selected a value for "Email address field" in the Form Options, make sure this is a field that will validate as an email address.
- Configure your site to send email via Mailtrap and see if mail is being received. If the Mail shows up in Mailtrap it demonstrates the site is sending email and the issue is after the email is sent.
- If emails are being sent and not received then either the email is being caught as spam OR there is a routing problem meaning that mail sent by the server is no leaving the server.
- If you have access to your server email logs check to see if there are any errors. Routing issues may well show up there.

Something we have seen on certain cPanel installs is that mail sent **to the same domain** as the site is hosted on gets delivered internally rather than to an external mailserver that has been configured using an MX record. For example your site is at `http://example.com` and the form email address is `client@example.com` the server routes it to some internal mailbox. You can test this by using a different email address or setting up Mailtrap and seeing the delivery works.

If this is happening contact your host and explain the issue and that you think mail may be routed internally.
