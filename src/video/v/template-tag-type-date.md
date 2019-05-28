---
layout: video_youtube.html
nav_groups:
  - primary
title: "Template Tag Type Date"
video_id: -l8rMpWktp4
---

## Template Tag Type Date

In this video we are looking at template tags with a type attribute of date. 

Using a type of date will create a group of select boxes for day, month and year in the admin. This means that the admin can add a date. By default we order the fields day, month, year because Perch is developed by Brits. In the USA it s more natural to order the fields month, day, year and you can do this by using the field order attribute on a date type.

If you want a field that also allows time to be entered add `time`.

A few browsers now support the native HTML5 controls and will give you a nice date picker. If you know your client uses one of these then add native to your tag.

Once you have a date you probably don't want to use the default formatting.

Perch supports two methods of formatting dates. The first, uses the PHP date formatting. This works very well across all hosting however it does not support locale settings. So will use English formatting. The [full range of possible values](http://php.net/manual/en/function.date.php) can be found on the PHP.net website.

Adding format="D d F y" will show your date as Sun 04 July 10.

The second method uses strftime. This does support locales however it does not work reliably across operating systems. In particular some the settings do not work on Windows.

If you use `format="%A, %e %B %Y"` you get Sunday, 4 July 2010 in English but if your locale on the server is French you would get the date in French.

The [various values for strftime](http://php.net/manual/en/function.strftime.php) are also on the PHP.net site, along with an explanation of the issues across operating systems.
