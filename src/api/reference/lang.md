---
title: Lang
nav_groups:
  - primary
nav_sort: 99
---

As Perch supports multiple languages, apps too have the ability to do so. Language files are created in `perch/addons/apps/my_app/lang`. During development of your app you should:

- Make sure the lang folder inside your app is writable by PHP
- Set the Perch language setting to match the default language your app’s interface instructions are written in

As you create your app, text strings from the interface will be added to a new translation file inside the lang folder.

Strings passed through `PerchAPI_HTML` and `PerchAPI_Form` are automatically added to the translation. If you write anything to the
page directly, you should pass the string through `PerchAPI_Lang::get()`.

```php
$Lang = $API->get('Lang');
echo $Lang->get('Welcome to my app');
```

## Substitutions 

The `get()` method acts a little like `sprintf()` (and in fact uses `sprintf()`) to enable string substitutions.

```php
echo $Lang->get('Update the "%s" article', $Article->title());
```

You should take advantage of this capability when needing to insert dynamic content or markup into translations rather than breaking the string into multiple translations, as it enables the translator to restructure the phrase easily.

**Note**: it’s important that you don’t write raw strings to the page without pushing them through the translation system, as they won’t be
translatable.
