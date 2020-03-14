---
title: PerchUtil
nav_groups:
  - primary
---

The `PerchSystem` class holds a number of utility methods that enables access to utility functions. All methods are called statically, e.g.

```php
PerchUtil::urlify('Some String');
```

## Debugging

Enable [debug mode](/perch/configuration/debug/) to use the below debugging methods.

|Method|Purpose|
|-|-|
|debug|Add a message (string, array or object) to the debug output.|
|mark|Add a highlighted message to the debug output.|
|output_debug|Output the debug messages.|


## Redirects

|Method|Purpose|
|-|-|
|redirect|Perform an HTTP 30x redirect to the given URL|
|hold_redirects|Hold redirects. Useful for troubleshooting.|


## HTTP

|Method|Purpose|
|-|-|
|http_get_request|Make a HTTP get request.|
|http_post_request|Make a HTTP post request.|

## Files

|Method|Purpose|
|-|-|
|file_extension|Get the file extension|
|file_path|Make a file path OS-safe by swapping out the correct `DIRECTORY_SEPARATOR`|
|get_mime_type|Get the file MIME type|



## Other

|Method|Purpose|
|-|-|
|urlify|Convert a string to a basic URL-safe version.|
|html|Convert special characters in a string to HTML entities.|
|is_valid_email|Check whether a given string is a valid email address.|
|is_assoc|Check whether an array is associative.|
|get_client_ip|Get the client IP address|