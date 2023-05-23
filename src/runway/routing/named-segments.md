---
title: Named Segments
nav_groups:
  - primary
nav_sort: 2
---

Matching the URL is one thing, but the next logical step is that you want to use parts of that URL to do things in your page. In our blog post example, we'd want the slug in order to be able to look up the correct post.

To do that, you just add the name to the token. Let's say I want to use the slug as `postslug` within my page. I'd modify the pattern to be:

```php
blog/[year]/[slug:postslug]
```

The `[slug:postslug]` token means simply "a slug named `postslug`". You'd use it in your page with:

```php
perch_get('postslug')
```

In your templates, we prefix the name with `url_` to avoid naming conflicts with your own template IDs:

```html
<perch:content id="url_postslug">
```

## Advanced features

You can match from multiple options. The below would match `/product/view/1234` and `/product/order/1234` with the _view_ or _order_ being passed through as action and the product ID as `product_id`:

```php
users/[view|order:action]/[i:[product_id]]
```

Another example, to offer a report in XML, CSV or JSON format:

```php
report.[xml|csv|json:format]
```
