---
title: Runtime functions
nav_sort: 4
nav_groups:
  - primary
---

Apps that expose PHP functions to the user’s page should create a file at `perch/addons/apps/my_app/runtime.php`. Admin-only apps don’t need this file.

This runtime.php file will be included in the user’s pages. You should declare your functions within it.

## Including the file

Unlike admin.php which is automatically included at edit time, the runtime file is not automatically included by Perch. This is to reduce overhead, as the process occurs for every page load. Searching for runtime files to include would be a waste.

Instead, you need to add it to `perch/config/apps.php` – and will need to instruct users to do the same as part of the installation procedure if you intend to distribute the app. You can see examples of this in the installation documentation for our official apps.

## Autoloading

The `runtime.php` file is also the place to add your app's autoloader for any classes needed by your page functions.

```php
spl_autoload_register(function($class_name){
	if (strpos($class_name, 'MyApp_')===0) {
		include(PERCH_PATH.'/addons/apps/my_app/lib/'.$class_name.'.class.php');
		return true;
	}
	return false;
});
```

## Search handlers

If your app uses a [search handler](/api/search/), you can also register that in your `runtime.php` file.

```php
PerchSystem::register_search_handler('MyApp_SearchHandler');
```

## Template handers

If your app uses a [template handler](/api/templates/) for handling custom template tags, you can also register that in your `runtime.php` file.

```php
PerchSystem::register_template_handler('MyApp_Template');
```

## Form handler

If your app needs to handle forms, you can add a form handler function. Perch will call this function when a [Perch-templated form](/templates/form/) that specifies your app as the handler is submitted:

```html
<perch:form id="register" app="my_app" method="post"></perch:form>
```

Your function must be called `{your_app_ID}_form_handler`:

```php
function my_app_form_handler($SubmittedForm) {}
```

The form handler receives a [PerchAPI_SubmittedForm](/api/reference/perchapi-submittedform), which you can use to validate the submission and access the submitted data and uploaded files.