---
title: Example Email Template
nav_groups:
  - primary
---

The Forms app has the option to send templated HTML emails. If using this option, you need to create a template that outputs the fields you are collecting.

Form email templates live in the folder `perch/templates/forms/emails` and should have `.html` file extensions.

## Creating a template

The template should be a complete HTML page containing Perch template tags wherever you need to output content. A very barebones example would be as follows.

```html
<html>
<head>
	<title><perch:email id="email_subject"></title>
</head>
<body>
  <h1>A message from your website</h1>
  <p><perch:email id="email_message" encode="false"></p>
  <table>
    <tr>
      <th>Name</th>
      <td><perch:email id="name"></td>
	</tr>
    <tr>
      <th>Email</th>
      <td><perch:email id="email"></td>
	</tr>
    <tr>
      <th>Message</th>
      <td><perch:email id="message" encode="false"></td>
	</tr>
  </table>
</body>
</html>
```

Use `<perch:email>` tags to output your content, with an ID to match the ID in your form template.

Two special values are defined:

|Name|Value|
|-|-|
|email_subject|The email subject line. |
|email_message|The introduction message defined in the form options.|

