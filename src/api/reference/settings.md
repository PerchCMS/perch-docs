---
title: Settings
nav_groups:
  - primary
---

The Settings class enables you to get and set Perch settings.

```php
$Settings = $API->get('Settings');
```

## Methods

The PerchAPI_Settings class exposes a number of methods

### PerchAPI_Settings::set(string $id, string \value)

Sets the setting $id to the value \value.

If you create your own settings within an app, you should prefix the ID
with your app ID.

```php
$Settings->set('my_sample_username', 'joesmith');
```

### PerchAPI_Settings::get(string $id)

Gets the setting $id. Returns a PerchSetting object.

## PerchSetting Methods

PerchAPI_Settings returns PerchSetting objects, which expose the
following methods.

### PerchSetting::settingValue()

Returns the value of the setting.

```php
echo $Settings->get('my_sample_username')->settingValue();
```
