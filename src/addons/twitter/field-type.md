---
title: Field Type
nav_groups:
  - primary
---

The Twitter add-on, as of version 3.3 includes a field type. This field type will let the content editor paste in a Tweet ID, or URL to a tweet from the Twitter website and display the tweet in templated form on your site.

To use the field type, set `type="tweet"` in your content templates.

```html
<perch:content id="tweet" type="tweet" label="Tweet ID" encode="false">
```

The field type requires that you have the Twitter app installed on your site and have setup your site with the Twitter API as explained in the app installation instructions.

## Template

The default template is the same template `tweet.html` as used to display other tweets via the app. You can also pass in a custom template by specifying this in your template tag.

```html
<perch:content id="tweet" type="tweet" label="Tweet ID" encode="false" template="twitter/my_template.html">
```

Remember that you need to ensure that you comply with the [Twitter Display Requirements](https://dev.twitter.com/overview/terms/display-requirements) when displaying Tweets on your website.
