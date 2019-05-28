---
title: HTML
nav_groups:
  - primary
nav_sort: 99
---


The HTML class can be used for outputting bits of Perch user interface without needing to worry about what HTML or CSS to use. This makes it easy to have your app match the Perch UI.

```php
$HTML = $API->get('HTML');
```

In use:

```php
# Side panel
echo $HTML->side_panel_start();
echo $HTML->heading3('I am the sidebar');
echo $HTML->side_panel_end();

# Main panel
echo $HTML->main_panel_start();
echo $HTML->heading1('Sample');
echo $HTML->heading2('This is my app');
echo $HTML->main_panel_end();
```

## Methods

The `PerchAPI_HTML` class exposes a number of methods.

### PerchAPI_HTML::side_panel_start()

Returns the HTML for the opening of the side panel down the right of the page.

```php
echo $HTML->side_panel_start();
...
echo $HTML->side_panel_end();
```

### PerchAPI_HTML::side_panel_end()

Returns the HTML for the closing of the side panel down the right of the page.

```php
echo $HTML->side_panel_start();
...
echo $HTML->side_panel_end();
```

### PerchAPI_HTML::main_panel_start()

Returns the HTML for the opening of the main content area of the page.

```php
echo $HTML->main_panel_start();
...
echo $HTML->main_panel_end();
```

### PerchAPI_HTML::main_panel_end()

Returns the HTML for the closing of the main content area of the page.

```php
echo $HTML->main_panel_start();
...
echo $HTML->main_panel_end();
```

### PerchAPI_HTML::heading1(string $string)

Returns an HTML `<h1>` tag. The string is translated. Takes additional arguments in the style of `printf`, so if parts of the string should not be translated, use a marker and the pass the non-translated portion as an argument.

```php
echo $HTML->heading1('My heading');
echo $HTML->heading1('My %sheading%s', '<span>', '</span>');
```

### PerchAPI_HTML::heading2(string $string)

Returns an HTML `<h2>` tag. The string is translated. Takes additional arguments in the style of `printf`, so if parts of the string should not be translated, use a marker and the pass the non-translated portion as an argument.

```php
echo $HTML->heading2('My heading');
echo $HTML->heading2('My %sheading%s', '<span>', '</span>');
```

### PerchAPI_HTML::heading3(string $string)

Returns an HTML `<h3>` tag. The string is translated. Takes additional arguments in the style of `printf`, so if parts of the string should not be translated, use a marker and the pass the non-translated portion as an argument.

```php
echo $HTML->heading3('My heading');
echo $HTML->heading3('My %sheading%s', '<span>', '</span>);
```

### PerchAPI_HTML::heading4(string $string)

Returns an HTML `<h4>` tag. The string is translated. Takes additional arguments in the style of `printf`, so if parts of the string should not be translated, use a marker and the pass the non-translated portion as an argument.

```php
echo $HTML->heading4('My heading');
echo $HTML->heading4('My %sheading%s', '<span>', '</span>');
```

### PerchAPI_HTML::para(string $string)

Returns an HTML `<p>` tag. The string is translated. Takes additional arguments in the style of `printf`, so if parts of the string should not be translated, use a marker and the pass the non-translated portion as an argument.

```php
echo $HTML->para('You may edit your options here.');
echo $HTML->para('You may %sedit your options%s here.', '<a href="../options">', '</a>);
```

### PerchAPI_HTML::warning_message(string $string)

Returns the HTML for a warning message. The string is translated.

```php
echo $HTML->warning_message('You have no content yet');
```

### PerchAPI_HTML::success_message(string $string)

Returns the HTML for a success message. The string is translated.

```php
echo $HTML->success_message('The item was successfully updated.');
```

### PerchAPI_HTML::failure_message(string $string)

Returns the HTML for a failure message. The string is translated.

```php
echo $HTML->failure_message('This item cannot be deleted.');
```

### PerchAPI_HTML::encode(string $string, bool $escape_quotes)

Returns the HTML encoded version of the string

```php
echo $HTML->encode('<script></script>');
```

When outputing into a quoted string (such as a tag attribute) you should use the second parameter to escape quotes:

```php
echo '<div class="' . $HTML->encode($class_name, true) . '">';
```