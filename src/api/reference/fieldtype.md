---
title: FieldType
nav_groups:
  - primary
---

To create a new field type to handled, e.g. `type="foo"` you would create a new PHP class at the following location:

```unix
/perch/addons/fieldtypes/foo/foo.class.php
```

Your class would be called `PerchFieldType_foo` and should extend `PerchAPI_FieldType`. Provided you stick to that naming convention for
your class file, you can put any related files your field type needs in your folder. Be that API libraries, CSS, JavaScript or what have you. Everything your field type needs should be contained in its folder.

Within the class, the following methods are defined. They are all optional - you only need to redeclare them when the behaviour of your field type differs from the basic functionality defined by `type="text"`.

|Method|Description|
|-|-|
|[render_inputs](/api/reference/fieldtype/render-inputs)| Renders the edit fields in the Perch control panel|
|[get_raw](/api/reference/fieldtype/get-raw)|Reads in the form data when submitted and processes it|
|[get_processed](/api/reference/fieldtype/get-processed)|Gets the data ready for templating|
|[get_search_text](/api/reference/fieldtype/get-search-text)|Formats the field value for the search index so the content of this field can be searched|
|[render_admin_listing](/api/reference/fieldtype/render-admin-listing)|Returns an HTML representation of the content for use in the list view of listdetail edit mode.|
|[add_page_resources](/api/reference/fieldtype/add-page-resources)|Adds links for any JavaScript or CSS required by the field type.|

Your class can contain any other functions needed for the tasks it needs to do.

## Example

```php
  class PerchFieldType_foo extends PerchAPI_FieldType
  {
    public function render_inputs($details = array()) {
    
    }
   
    public function get_raw($post = false, $Item = false) {
    
    }
    
    public function get_processed($raw = false) {    
    
    }
    
    public function get_search_text($raw = false) {
    
    }

    public function render_admin_listing($raw = false) {
    
    }
  }
```
