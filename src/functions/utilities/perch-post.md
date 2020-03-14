---
title: perch_post()
nav_groups:
  - primary
---

The `perch_post()` function does the same job as `$_POST` in PHP, but has some convenient safeguards and options built in.

PHP has a standard way to read values from POST requests. If you’ve done any PHP development, you’ll be familiar with using something like `$_POST['message']` to read a value from a POST request.

You can do that in Perch, too. However, `$_POST` can be hard to use, because if you try to read in a value that hasn’t been set, PHP will throw an error. This means you need to test for it being set, and decide whether to read it or not. To make life easier, Perch has `perch_post()`.

## Parameters

| Type | Description |
|-|-|
| String   | The array element index to look for in `$_POST`  |
| String | A default value to use if the array element in `$_POST` is empty or not set |


## Usage examples

If we have a HTML form with `method="post"`:

```html
<form action="contact.php" method="post">
    <label for="visitor_name">Name</label>
    <input type="text" name="visitor_name" id="visitor_name">
    <input type="submit">
</form>
```

We can get the value of the submitted field `visitor_name` using `perch_post()`:

```php
$name = perch_post('visitor_name');
```
If we want to set the name to "Anonymous" if there is no `visitor_name` value, we can use:

```php
$name = perch_post('visitor_name', 'Anonymous');
```

By default, the function returns `false` if it cannot find the submitted value. This means we can use it in conditional statements:

```php
if(perch_post('agree_terms')) {
    // only process data if user agrees to terms
}
```

