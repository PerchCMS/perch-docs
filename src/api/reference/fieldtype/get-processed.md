---
title: get_processed()
nav_sort: 3
nav_groups:
  - primary
---

**Required Function: `get_processed($raw=false)`**

**Purpose:** to return processed or formatted content for use in a
template, based on any options given in the template tag.

This function takes the raw value and returns the processed version for
use in templates. This could mean returning the HTML version of a
Textile field, or a YouTube video embed code instead of a video URL.

Note, this function should be picking from data already prepared by
`get_raw` as it is sometimes called at runtime. Don’t do any heavy
processing here – just cherry-pick the data already processed to return.

Should return a string.