---
title: render_admin_listing()
nav_sort: 6
nav_groups:
  - primary
---


**Function: `render_admin_listing($raw=false)`

**Purpose:** to create an HTML string containing a representation of the
content for use in the listdetail edit mode listing page.

For non-text content types, this is useful for customising the value
that is displayed in the listdetail edit most listing page. For example,
the default Image field type returns an HTML image tag with the preview
thumbnail of an image, scaled down to 50% of its usual dimensions.

_This function is only typically needed if your field type returns
something that doesn’t work well as text in a listing._