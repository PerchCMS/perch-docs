---
title: Adding Settings
nav_sort: 3
nav_groups:
  - primary
---

Apps sometimes need to offer the user configuration options, and for this purpose they can add items to the Perch Settings page.

This is done from within the `admin.php` file.

## Adding a setting

```php
$this->add_setting('my_app_editorMayDeleteStuff', 'Editors may delete stuff', 'checkbox', false);
```

The `add_setting()` method tags 6 arguments:

|Argument|Type|Description|Example|
|-|-|-|
|Setting ID|String|A unique ID for the setting, prefixed with your app ID|my_app_editorMayDeleteStuff|
|Label|String|A label for the setting, presented to the user|Editors may delete stuff|
|Field type|String or callable|The type of form element to use for the setting, see below|text|
|Default value|String, int, bool|The default value for the setting|true|
|Options|Array|Optional, options for select fields|_See below_|
|Hint text|String|Optional hint text for displaying next to the field||

## Field types

There are four basic field types:

-   text
-   textarea
-   checkbox
-   select

If specifying a select box, you should also provide an options array.
Each item in the array is an associative array with label and value keys. The label is displayed, the value returned.

```php
$opts = array();
$opts[] = array('label'=>'Option 1', 'value'=>'1');
$opts[] = array('label'=>'Option 2', 'value'=>'2');
$opts[] = array('label'=>'Option 3', 'value'=>'3');
```

If you need a more complex type of field, you can specify a callable anonymous function as the argument for the field type. The function is passed the following

|Argument|Type|Description|
|-|-|-|
|Form|Object|An instance of `PerchAPI_Form`|
|ID|String|The ID of the setting|
|Details|Array|The current settings values|
|Setting|Array|The details of this particular setting|

It is then your responsibility to return the HTML for the completed form field. For example, Perch Shop defines the following to provide the user with a list of currency options that are marked as active in the database:

```php
$this->add_setting('perch_shop_default_currency', 'Default currency', 'PerchShop_Currencies::get_settings_select_list', '');
```

The `get_settings_select_list` function:

```php
public static function get_settings_select_list($Form, $id, $details, $setting)
{
	$opts = array();
	$opts[] = array('value'=>'', 'label'=>'');
	$c = __CLASS__;
	$Currencies = new $c;
	$currencies = $Currencies->get_by('currencyActive', '1');
	if (PerchUtil::count($currencies)) {
		foreach($currencies as $Currency) {
			$opts[] = array('value'=>$Currency->currencyID(), 'label'=>$Currency->currencyCode());
		}
	}
    return $Form->select($id, $opts, $Form->get($details, $id, $setting['default'])); 
}
```

$Form, $id, $details, $setting

## Reading your setting back

Once a setting is set, you need to be able to read it back. You do that like this:

```php
$Settings = $API->get('Settings');
$Settings->get('my_app_editorMayDeleteStuff')->val();
```
