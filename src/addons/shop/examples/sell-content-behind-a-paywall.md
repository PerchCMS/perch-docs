---
title: Sell content behind a paywall
nav_groups:
  - primary
---

The Members App is key in Shop. Your store Customers become Members so you get all of the expected Account creation tools – creating and resetting passwords, updating addresses and so on. Using the Members App as part of Shop also makes selling access to content via Shop incredibly easy.

## Securing content

To get set up you need to secure your content. There are a few ways you can do this. If you want to secure entire pages then you go into the Page Options and in the Details section of that Page you will see an option to “Restrict Access to Members with Tags”. Here you can add a tag or tags that a Member needs to have to see the content.

## Securing a page

There are also Members App Page Functions and Template Tags to help you secure content or just parts of content in Regions and in Runway Collections. For example you can check to see if a Member has the tag ‘paidcontent’ using a function in your page.

```php
if (perch_member_has_tag(‘paidcontent’)) {
  // do some stuff here
}
```

Or you can restrict parts of the content in a Region or Collection via your template with Template Tags.

```html
<perch:member has-tag="paidcontent">
  <p>You can download your content here.</p>
<perch:else:member>
  <p>You need to be a subscriber to see this!</p>
</perch:member>
```

Take a look at the documentation to see what else you can do with these Member Tags and Functions.

## Downloadable products

The Perch Members App can also secure downloads. Check out the documentation for details. You could list available downloads on a page, and use the Template Tags to check if the logged in Member has access to download each one.

## Assigning access on payment

You then need to assign a tag to the customer on payment. Set up the paid access as a Product in Perch Shop. In the Products App in the Perch Control Panel, select Tags in the Smart Bar and you can now add tags to apply when that product is purchased.

## Adding tags to a product

These tags can persist indefinitely or you can set them to expire (if the person is buying access for a certain period).

When this product is successfully purchased, Perch will apply the tag to the Member and they will then be able to see the secured content.

That’s it! You can now sell access to your download, e-book, video or articles.
