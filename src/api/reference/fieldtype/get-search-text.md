---
title: get_search_text()
nav_sort: 5
nav_groups:
  - primary
---

**Required Function: `get_search_text($raw=false)`**

**Purpose:** to prepare a version of the field content for use in the
search index.

This function should do whatever is needed to return a string of content
suitable for searching. For some field types, that may just mean
stripping HTML tags, for others it might be selecting the appropriate
parts of content and concatenating them into a single string. The map
field type, for example, returns the address of the pin, but nothing
else.

The string is used for search indexing only, and isn’t displayed to
anywhere.