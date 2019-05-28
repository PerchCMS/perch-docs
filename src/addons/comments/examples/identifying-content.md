---
title: Identifying content
nav_groups:
  - primary
---

To add comments to an item, you need to be able to uniquely identify the thing the comments are about.

That identifier might be with an existing ID for the item (like a product ID for a product, or an article ID for an article), or something you make up. The item ID is then used whenever you need to do anything with comments for that item, be that displaying comments, the comment form or getting the comment count.

Existing database IDs are perfect for this – but as identifiers need to be unique within your site, we’d recommend prefixing a database ID with something to identify the sort of item it is. For example, a product might have a database ID of `123`, but for comments you should use `product123` to make it distinct from `post123` and `photo123`.

```php
<?php
    perch_comments('product123');
    perch_comments_form('product123', 'Elasticated garden yoga pants');
?>
```
