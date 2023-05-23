---
title: Spam
nav_groups:
  - primary
---

Any form on the web is likely to receive some level of spam. The primary way to combat spam in blog comments is to use
[Akismet](https://akismet.com/). Akismet is a web service that checks comments and determines if they are spam.

## Using Akismet

Getting up and running with Akismet is simple. First register with Akismet – it’s free for personal use, and inexpensive for businesses. You will be given an API key which you can enter on the Settings page, in the Blog section.

If you’re using the default blog templates, Perch will now check your comments for spam as they arrive.

### Antispam template options

In order to pass your comments through to Akismet, Perch needs to know which of your fields contain which type of content. This is done with the `antispam` attribute on the
[perch:input](/docs/form/template-tags/input/) tag.

```php
<perch:input type="url" id="website" antispam="url">
```

On the field containing your commenter’s name, add `antispam="name"`

On the field containing your commenter’s email address, add
`antispam="email"`

On the field containing your commenter’s URL, add `antispam="url"`

And on any field that makes up the body of the message to be checked, add `antispam="body"`.

Perch will collect the data from these fields and pass it to Akismet for analysis.

## Using a honeypot field

An alternative option is to use a honeypot field. Honeypot fields are included in a field but hidden from sight. Any regular user won’t see the field and won’t fill it out. An automated spambot will tend to complete all fields in a form and will therefore complete the honeypot field, too.

If the form is submitted with a value in the honeypot field, it is marked as spam.

Create a honeypot field by using a normal field, and set
`antispam="honeypot"` like so:

```html
<perch:input type="text" id="banana" antispam="honeypot">
```

The field can be of any type (although it won’t work if `type="hidden"`) and can have any ID. It’s probably best not to call it anything obvious like `honeypot`!

You then need to make sure your users don’t fill it out. That usually means using CSS to hide the field in some way. Please consider all types of users – how will your honeypot field appear to screenreader users, for example? It might be a good idea to add a label telling the user to leave the field blank, and then hiding both the field and its label.

Perch deliberately makes no effort to hide the honeypot field from view – it simply processes it differently on submission. You should choose a method to hide it that suits your site, audience and goals.

If you are finding that spam still gets through the honeypot method then you will need to use something more robust such as Akismet.
