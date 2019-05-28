---
title: Form validators
permalink: /validators
nav_groups:
  - primary
nav_sort: 7
---

The Perch public-facing forms have lots of basic built-in validation for common input types. When you need to apply custom logic to field validation, you can do that with a custom form validator. They enable you do to things like check an email address isn't already in use, or verify some input against an external API. Form validators are implemented with an app.

## When to use

You don't need a custom validator for basic validations such as required fields, numbers and ranges, and the formats of common data types such as emails, or simple patterns. When they come into play is when you need to apply some logic such as comparing fields, testing against an external API, or looking something up in the database to see if it's valid.

## How to use

Validators don't need to be registered, you just need a class with a static method that can be called when the field is validated. The method gets passed the contents of the field as the first parameter. It needs to return `true` (acceptable value) or `false` (unacceptable).

You can use a single class for your validations, or just roll them in wherever they fit - it's up to you. The just need to be static methods, and the class needs to be either included, or known by your autoloader.

```php
class MyApp_Validators
{
	public static function check_email_in_use($email)
	{
		$API = new PerchAPI(1.0, 'myapp');
		$db	 = $API->get('DB');

		$sql = 'SELECT COUNT(*) FROM mytable WHERE userEmail='.$db->pdb($email);
    	$count = $db->get_count($sql);

    	if ($count===0) {
    		return true;
    	}

    	return false;
	}
}
```

This would then be invoked on a form input tag using the `helper` attribute.

```markup
<perch:input id="email" type="email" required helper="MyApp_Validators::check_email_in_use">
```

You can provide a customer error message for your validator, too.

```markup
<perch:error for="email" type="helper">
	Sorry, that email address is already in use.
</perch:error>
``` 