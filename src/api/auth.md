---
title: Authentication plugins
nav_groups:
  - primary
nav_sort: 1
---

When you need to manage your user accounts in an external system, authentication plugins enable you to do just that.

## How to use

An authentication plugin is a class that implements key methods such as `log_user_in` and `log_user_out`. It extends the `PerchAPI_AuthPlugin` class, and should be created in the `addons/plugins/auth` folder:

```unix
/perch/addons/plugins/auth/my_system/auth.php
```

In your `perch/config.php` file, set:

```unix
define('PERCH_AUTH_PLUGIN', 'my_system');
```

## The plugin class

At a minimum, the plugin class should implement the `log_user_in`, `log_user_out` and `resume_session` methods.

Both `log_user_in` and `resume_session` should return an array with the user's email address (as an identifier) and the slug of the Perch user role that the user should be assigned.

```php
class my_system_auth_plugin extends PerchAPI_AuthPlugin
{
    public function log_user_in($username, $password)
    {
        //make request to check username and password
        return [
            'email' => 'admin@example.com',
            'role'  => 'admin',
        ];
    }

    public function resume_session()
    {
        //make request to check username and password
        return [
            'email' => 'admin@example.com',
            'role'  => 'admin',
        ];
    }

    public function log_user_out()
    {
        return true;
    }
}
```