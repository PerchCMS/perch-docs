---
title: Working with Front Controllers
nav_groups:
  - primary
---

Perch is reasonably well namespaced and so can be integrated with most PHP frameworks without too much trouble. When using Perch with a Front Controller pattern (as utilised by most MVC frameworks), a downside is that Perch sees every page as the same script. Knowledge of its environment is lost.

To help address this, we’ve provided a mechanism for telling Perch which page it is on. The `set_page()` method of the static `PerchSystem` class can be called as below, after the Perch runtime has been included and before any content is requested.

```php
PerchSystem::set_page('/products/fish-cakes/index.php');
```

As Perch is used to receiving full paths (including a filename and extension) from the web server, be sure to set a filename for the best results.

Some examples:

```php
PerchSystem::set_page('/index.php');

PerchSystem::set_page('/products/index.php');

PerchSystem::set_page('/products/widgets.php');

PerchSystem::set_page('/about/founders/dave.php');
```

## Getting the page path

If you need to see what path Perch thinks the page is, you can use
`get_page()`

```
$page = PerchSystem::get_page();
```
