---
title: Email Configuration
nav_groups:
  - primary
---

To send emails – for example password reset emails – Perch needs to be able to send mail via PHP. Your host may have specific settings you need to use to allow this to happen, or you can send mail via a third party.

The following settings allow you to configure this. If you want to test that your mail configuration is working then log into Perch admin and visit Settings > Email. Here you can send a test email, if you receive the mail then your email is correctly configured. It is a good idea to test this before you need to do a password reset!

If you are not receiving mail then ask your host what you need to do to send mail from PHP, then use the below settings to configure Perch to meet their advice.

## Email Settings

|Setting|Value|
|-|-|
|PERCH_EMAIL_FROM|Default email address to send mail from|
|PERCH_EMAIL_FROM_NAME|Default name to send email from|
|PERCH_EMAIL_METHOD|mail, smtp, sendmail, api|
|PERCH_EMAIL_HOST|Host for SMTP mail|
|PERCH_EMAIL_AUTH|True or false. Use authenticated SMTP|
|PERCH_EMAIL_PORT|SMTP port. Defaults to 25|
|PERCH_EMAIL_USERNAME|Username for authenticated SMTP|
|PERCH_EMAIL_PASSWORD|Password for authenticated SMTP|
|PERCH_EMAIL_SECURE|SMTP connection method. ssl, tls or an empty string|

An example of configuration required to send email via Google’s Gmail SMTP would be as follows:

```php
define('PERCH_EMAIL_METHOD', 'smtp');
define('PERCH_EMAIL_HOST', 'smtp.gmail.com');
define('PERCH_EMAIL_AUTH', true);
define('PERCH_EMAIL_SECURE', 'ssl');
define('PERCH_EMAIL_PORT', 465);
define('PERCH_EMAIL_USERNAME', 'your.name@gmail.com');
define('PERCH_EMAIL_PASSWORD', 'your gmail password');
```

## Gmail
If sending through Gmail, you now need to enable [less secure apps settings](https://www.google.com/settings/security/lesssecureapps) otherwise you'll receive a Could Not Authenticate message in Perch.

## Microsoft Office 365
If sending through Office 365, the `PERCH_EMAIL_FROM` value must match the value of `PERCH_EMAIL_USERNAME` (your Office 365 email address).

Microsoft may reject sending emails if the `PERCH_EMAIL_FROM_NAME` is set to an email address.

## Api Method
If using the API method, Perch will fire the `email.send` event hook.   You can configure a custom app to listen to the `email.send` event using the [Perch Event Hook](/api/events/) system to handle the email as required.