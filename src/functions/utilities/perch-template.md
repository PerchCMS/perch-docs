---
title: Rendering Templates
nav_groups:
  - primary
---

Sometimes it’s useful to be able to render a set of data using a Perch template on the fly. Perhaps you’ve used `skip-template` to fetch an array, have done some work on that array, and then want to show it using the templating engine.

The `perch_template()` function enables you to do that.

```php
perch_template('content/article.html', array(
    'heading'=>'Hello world',
    'date'=>'2013-05-09 12:30:00',
));
```

The function renders the template specified by the first argument using the data array specified in the second.

The third argument, if given as `true`, will return the rendered HTML rather than echoing it.

The template file name must a path within the `templates` folder, not just the bare file name. This function is part of the Content app, so presumes a `perch:content` tag namespace.
