---
title: no-index
nav_groups:
  - primary
---

The `no-index` attribute tells Perch not to index a field. In general, any field that is not needed for sorting or filtering does not need to be indexed. The attribute works for [content regions](/functions/content/) and [collections](/runway/collections/).

```html
<perch:content id="img" type="image" label="Image" no-index>
```

An example for an article:

```html
<!--*  articles may be filtered or sorted by title *-->
<perch:content id="title" type="text" label="Title">

<!--* article URL may contain the slug (e.g. /blog/?s=perch-is-awesome), which can be used to look up the article *-->
<perch:content id="slug" type="slug" for="title">

<!--* articles need to be sorted by the published date *-->
<perch:content id="date" type="date" label="Published Date">

<!--* drafts need to be excluded, so status field is needed for filtering *-->
<perch:content id="status" type="select" label="Status" options="Draft,Published">


<!--* articles don't need to be filtered by the image or the body text *-->
<perch:content id="img" type="image" label="Image" no-index>
<perch:content id="desc" type="textarea" label="Article Body" no-index>
```