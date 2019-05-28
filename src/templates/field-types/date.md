---
title: Date
nav_groups:
  - primary
---

Using a type of date will create a group of select boxes (day, month, year) in the admin.

If you include the **format** attribute on a Perch Template Tag with a type of date, this allows you to set how the date will be displayed on the website.

The value of format should be a formatting code, e.g. `format="d M Y"`.

Accepts either PHP [date](http://www.php.net/manual/en/function.date.php) formatting (which does not support locale settings) and [strftime](http://www.php.net/manual/en/function.strftime.php) formatting (which does).

If you set the optional attribute time to true, the date field will also have selections for hour and minute.

## Examples

Date formatted as *Sun 04 July 10* using PHP date formatting options:

```php
<perch:content id="event_date" type="date" label="Date of event" format="D d F y">
```

An ISO 8601 standard date:

```php
<perch:content id="event_date" type="date" label="Date of event" format="c">
```

Locale-compatible date Sunday, 4 July 2010 using strftime options, if
locale was set to fr\_FR this would display as *Dimanche, 4 juillet
2010*

```php
<perch:content id="event_date" type="date" label="Date of event" format="%A, %e %B %Y">
```

## strftime issues

strftime formatting is not the same across operating systems therefore you may find that some values do not work on a Windows system. Please
check the [PHP documentation](http://www.php.net/manual/en/function.strftime.php) for more information before raising this as an issue in Perch.

If you are developing a site on Windows but moving it to a Linux webhost then you may find that locally your formatting behaves inconsistently but the problem is resolved on the live host.

## Using native HTML5 controls

If you know your Perch users have a modern browser with HTML5 form field support, you may want to use the native browser controls for date input. Enable this by adding the attribute `native` with a value of `true`.

```php
<perch:content id="date" type="date" label="Date" format="d F Y" native>
```

For a `datetime` field add `time` as usual:

```html
<perch:content id="datetime" type="date" time label="Date/Time" format="d F Y H:i" native>
```

For `datetime-local` set `time="local"`:

```html
<perch:content id="datetime" type="date" time="local" label="Date/Time" format="d F Y H:i" native>
```

## Changing field order

By default, the select boxes for a date field are ordered day, month, year. Some users may prefer a different order, for example an order of month, day, year is common in the USA.

This can be set with the `fieldorder` attribute. It takes a string of the letters `d`, `m` and `y` in the order you want them.

Day, month, year:

```html
fieldorder="dmy"
```

Month, day, year:

```html
fieldorder="mdy"
```

In full:

```html
<perch:content id="event_date" type="date" label="Date of event" format="D d F y" fieldorder="mdy">
```
