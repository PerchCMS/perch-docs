---
title: Time and Date Configuration
nav_groups:
  - primary
---

There are a number of options that can be set to configure how Perch displays times within the administration control panel.

These settings are [PHP strftime formatting codes](http://php.net/strftime), and can be changed to fit your preference, or if your server doesn’t adequately support the defaults.

## Date and time formats

|Setting|Value|
|-|-|
|PERCH_DATE_LONG|Longer format date, month and year|
|PERCH_DATE_SHORT|Shorter format date, month and year|
|PERCH_TIME_LONG|Longer format hours and minutes|
|PERCH_TIME_SHORT|Shorter format hours and minutes|

## Time zone settings

By default, Perch will use the time zone of your server. You can change that to a standard [PHP time zone](http://php.net/manual/en/timezones.php) if needed.

## Time zone

|Setting|Value|
|-|-|
|PERCH_TZ|Sets the timezone. A value PHP timezone string, like 'UTC' or 'Europe/London'|
