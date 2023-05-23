---
title: Custom Tokens
nav_groups:
  - primary
nav_sort: 3
---

For most cases, the [supplied tokens](/runway/routing/tokens) can be used to match most common types of URL. We don't pretend to know exactly how your URLs will be formed and what sort of tokens you wish to match. For this reason, you can set up custom tokens in your `config/runway.php` configuration file.

You might need a custom token if:

1. You need to match a very specific pattern within a segment
2. You need to match a string that spans multiple URL segments
3. You need to match segments in non-latin character sets not covered by the latin dafaults

If any of those cases is true, read on. Otherwise, you should be just fine with the defaults.

Open up `config/runway.php` and search for the `routing_tokens` section.

```php
'routing_tokens' => [

],
```		

There's no getting away from the fact that you need to know regular expressions, unfortunately. The idea with custom tokens is that you can write and test your regular expression just once, and then use it by name from that point on. What's more, as you're matching just a small part of a URL with a token, they're simpler to write and can also be shared.

As an example, say you needed a token for a product SKU in the URL. The SKUs the client uses are 3 numbers followed by 3 letters, like `abc123`. Your custom token definition would look like this:

```php
'sku' => '[a-z]{3}[0-9]{3}'
```

Added to the `runway.php` file like this:

```php
'routing_tokens' => [
    'sku' => '[a-z]{3}[0-9]{3}',
],
```

Once that's been defined, you can use it in your routing patterns without needing to think about it again:

```php
product/[sku]/reviews
```
