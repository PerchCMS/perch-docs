---
title: rewrite
nav_groups:
  - primary
---

The rewrite attribute can be used on a template tag that outputs a URL with a querystring. A good example is the `next_url` and `prev_url` links output by [pagination](/docs/templates/pagination/).

```html
<perch:content id="next_url" rewrite="/archive/{page:page/%s/}">
```

The rewrite attribute is a literal string, apart of sections in
{braces}. These sections are matched against the arguments on the querystring. The format is as follows:

```php
{querystring parameter to match:replacement}
```

The replacement can contain a `%s` to represent the value of the item.

So to match `page=2` and rewrite it to, for example, `p2`, we’d need the following replacement:

```php
{page:p%s}
```

To take an example from the Blog app, the pagination tags might output a URL like this:

```php
/blog/archive.php?cat=cooking&page=2
```

Let’s say we wanted to rewrite that link to the following format:

```php
/blog/archive/category:cooking/page:2/
```

The `rewrite` attribute would need to look like this:

```php
rewrite="/blog/archive/{cat:category:%s/}{page:page:%s/}"
```

To account for a possible `tag` and `year` parameter, we would just add those in.

```php
rewrite="/blog/archive/{cat:category:%s/}{tag:tag:%s/}{year:year:%s/}{page:page:%s/}"
```
