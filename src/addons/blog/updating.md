---
title: Updating
nav_groups:
  - primary
---

Updating the Blog App is usually a case of replacing the `perch_blog` folder in `perch/addons/apps`. See the [Changelog](/addons/blog/changelog) for details of what has changed between the version you are updating from and the latest.

If you are updating from a version of Blog older than **Blog 4.5** read the below important information.

## Updating from a version prior to 4.5

With Blog 4.0, the `post.html` master template changed to more fully control the post editing process. Prior to this, more of the logic was hard-coded into the app itself.

If updating from an older version of Blog, you’ll need to make sure your
`post.html` template has a full set of attributes for each tag. Check that:

-   All tags have `type` and `label` attributes
-   Any processing options (like using Markdown, Textile or allowing
    HTML in posts) are set correctly on the tag (Markdown is now the default previously it was Textile)
-   The `order` attributes represent the order you would like the fields to appear
-   Any fields in your post template that aren’t part of the edit form (like Author name) have `type="hidden"` set

**Blog 4.5 introduced further changes** to integrate the Categories functionality

-   Make sure you have added the Categories app [to your apps.php file](/docs/installing-perch/installing-apps/)
-   Update `post.html` with the below category field
-   Update any category templates as detailed below

Categories are now managed centrally. Your existing categories will be imported, but you need to add the following to your `post.html` template:

```php
<perch:categories id="categories" set="blog" label="Categories" display-as="checkboxes">
  <a href="archive.php?cat=<perch:category id="catSlug" type="slug">">
    <perch:category id="catTitle" type="text">
  </a>
</perch:categories>
```

As the categories system has been updated, you also need to update any blog templates that output categories:

1. Convert the tags from `<perch:blog>` to `<perch:category>`
2. Update the IDs from `id="categoryX"` to `id="catX"`, e.g. `categoryTitle` to the new, shorter `catTitle`
3. Update count tags from `id="qty"` to `id="count.blog.post"`

The easiest way to do this might be to take the new default templates and re-customize it to fit your site.
