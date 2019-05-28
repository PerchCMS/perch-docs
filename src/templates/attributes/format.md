---
title: format
nav_groups:
  - primary
---

The format attribute can be used to change the formatting of the content as it is output.

## Dates and times

When used on a date (or date and time) field, the format attribute can be used to change how the date is presented.

The value is a formatting code, e.g. format=“d M Y”. Accepts either PHP date formatting (which does not support locale settings) and strftime formatting (which does).

See the documentation for the [date field type](/docs/templates/attributes/type/date/) for more information.

## Numbers

To format a number, start your formatting code with \#: followed by the number of decimal places to use:

```html
format="#:2"`
```

There are two further options you can specify; the symbol to use for a decimal point, and the separator to use for thousands. By default these are . and , is most circumstances. If you which to specify these, they follow the number of decimal places, separated with a | character:

```html
format="#:2|.|,"
```

## Money

To format currency values, Perch again hooks into some native PHP functionality. Begin your value with `$:` and then add any valid PHP money format string.

```html
format="$:%.2n"
```

## Padding

A string can be padded with another string, to the left or the right, until it reaches a desired length. Begin you value with `P:` follow by the length, the string to pad with and then ‘left’ or ‘right’, separated with a | character:

```html
format="P:length|string|left"
```

e.g.

```html
format="P:2|0|left"
```

## Character limits

Like using the `chars` attribute, format can also limit the string to a number of characters. This is useful for formatting strings for comparison in `perch:if` tags.

```html
format="C:length"
```

e.g.

```html
format="C:2"
```

## Case

Set `format="UC"` for upper case and `format="LC"` for lower case.

## File sizes in bytes to kilobytes and megabytes

Set `format="MB"` to format the value as a file size. This presumes the content is in bytes, and formats as kilobytes or megabytes depending on the size.
