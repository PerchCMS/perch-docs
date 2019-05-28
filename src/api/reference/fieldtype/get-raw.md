---
title: get_raw()
nav_sort: 2
nav_groups:
  - primary
---

The `get_raw()` method is used to capture any submitted content for the field type, process it and prepare it for storing in the database.

## get_raw($post = false, $Item = false)

This method is responsible for reading the submitted values from the form data and preparing them to be stored. This usually means returning either a string, or an associative array for more complex types.

This function should do any processing required, as it only happens at edit time. So if you need to interact with web APIs etc, do it here and store the result to be used by `get_processed` later.