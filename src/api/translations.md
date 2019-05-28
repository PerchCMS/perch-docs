---
title: Translations
nav_groups:
  - primary
nav_sort: 11
---

As Perch supports multiple languages, apps too have the ability to do so. Language files are created in `perch/addons/apps/my_app/lang`. 

During development of your app you should:

- Make sure the lang folder inside your app is writable by PHP
- Set the Perch language setting to match the default language your app’s interface instructions are written in

As you create your app, text strings from the interface will be added to a new translation file inside the lang folder.

Strings passed through `PerchAPI_HTML` and `PerchAPI_Form` are automatically added to the translation. If you write anything to the page directly, you should pass the string through `PerchAPI_Lang::get()`.

```php
$Lang = $API->get('Lang');
echo $Lang->get('Welcome to my app');
```

The [Lang API reference](/api/reference/lang) has full details of how the languages functions can be used.