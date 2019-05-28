---
title: Registering
nav_sort: 1
nav_groups:
  - primary
---

If an app provides an interface via the Perch control panel, it must register itself with Perch. This is done in the `perch/addons/apps/my_app/admin.php file`.

```php
    $this->register_app('my_app', 'My App', 5, 'An exciting app of goodness', '1.0');
```

The register_app() method takes 6 arguments prior to this Perch version it took 5:

|Type|Description|
|-|-|
|String|Your app ID|
|String|A name/label for your app|
|Int|The priority in which is should appear on the Perch tab bar|
|String|A brief description (unused currently)|
|String|A semantic versioning version number|
|Bool|Whether the app should display in the app menu|

There’s no good way to determine the priority setting you should give. If your app does something administrative, it would make sense to give it a high number to shift it to the end of the line of tabs (Pages is always the first item). Really this is more to give the user control of the apps they have installed.

Once an app is registered, it appears on the tab bar.

## Asserting a required version

If your app relies on a certain version of Perch to run (perhaps using features that an older install of Perch would not have available), you can assert that your app requires a minimum version:

```php
$this->require_version('my_app', '1.7.3');
```

If the version of Perch is not greater than or equal to the number you state, Perch will throw an error preventing the user from continuing until they update or uninstall the app.

## Autoloading

The `admin.php` file is also the place to add your app's autoloader so that your class files can be found. You'll do the same in your `runtime.php` file for any classes needed by page functions.

```php
spl_autoload_register(function($class_name){
	if (strpos($class_name, 'MyApp_')===0) {
		include(PERCH_PATH.'/addons/apps/my_app/lib/'.$class_name.'.class.php');
		return true;
	}
	return false;
});
```

## Template handers

If your app uses a [template handler](/api/templates/) for handling custom template tags, you can also register that in your `admin.php` file.

```php
PerchSystem::register_template_handler('MyApp_Template');
```