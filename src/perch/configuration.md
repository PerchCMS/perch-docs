---
title: Configuration
layout: section.html
nav_sort: 3
nav_groups:
  - primary
---

For many installs the values created during setup are all you need for
your Perch Config file. However there are some additional settings that
can be changed here and this section details them.

The values can be set in the `perch/config/config.php` file. They should
appear, within PHP blocks, as follows.

```php
<?php
    define('SETTING_NAME', 'setting value');
?>
```

For example, your configuration might look like this:

```php
<?php
    define('PERCH_LICENSE_KEY', 'PXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX');
    define("PERCH_DB_USERNAME", 'my_database_user');
    define("PERCH_DB_PASSWORD", 'secret');
    define("PERCH_DB_SERVER", "localhost");
    define("PERCH_DB_DATABASE", "perch2");
    define("PERCH_DB_PREFIX", "perch2_");
    define('PERCH_EMAIL_FROM', 'hello@grabaperch.com');
    define('PERCH_EMAIL_FROM_NAME', 'Perch');    
    define('PERCH_EMAIL_METHOD', 'smtp');
    define('PERCH_LOGINPATH', '/perch');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', dirname(__FILE__)));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');
    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
    define('PERCH_HTML5', true);
?>
```

The following pages contain information about the specific areas you
might need to change configuration settings for.
