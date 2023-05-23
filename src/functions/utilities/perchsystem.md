---
title: PerchSystem
nav_groups:
  - primary
---

The `PerchSystem` class holds a number of utility methods that enables access to more advanced system functions. All methods are called statically, e.g.

```php
PerchSystem::redirect('http://example.com/');
```

|Method|Purpose|
|-|-|
|set_page|Set the URL Perch should use for the current page. See [Working with Front Controllers](/perch/building/working-with-front-controllers/)|
|get_page|Get the URL of the page as Perch currently sees it.|
|register_search_handler|Register a new search handler. See [Search handlers](/api/search/)|
|register_admin_search_handler|Register a new admin search handler. See [Search handlers](/api/search/)|
|get_registered_search_handlers|Get a list of the currently registered search handlers|
|get_registered_bucket_handlers|Get a list of the currently registered bucket handlers. See [Bucket handlers](/api/buckets/)|
|register_template_handler|Register a new template handler. See [Template handlers](/api/templates/)|
|get_registered_template_handlers|Get a list of the currently registered template handlers.|
|register_feather|Register a new feather. See [Feathers](/api/feathers)|
|set_var|Pass a variable into the template engine. See [Passing variables into templates](/templates/passing-variables-into-templates/)|
|unset_var|Remove a previously set template variable|
|set_vars|Pass an array of variables into the template engine|
|get_var|Get the value of a template engine variable|
|get_vars|Get all the variables set for the template enigne|
|redirect|Perform an HTTP 30x redirect to the given URL|
|force_ssl|Force a page to switch to use the HTTPS protocol. See [SSL configuration](/perch/configuration/ssl/)|
|force_non_ssl|Force a page to switch away from using the HTTPS protocol|