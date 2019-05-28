---
title: Relationships
nav_groups:
  - primary
---

The `<perch:related>` template tag enables you to relate items of content around your site to the contents of a Collection.

## Creating a relationship

Take an example of articles and authors for those articles. Each article in the `Articles` collection may have one or more authors in the `Authors` collection. To create the relationship, we'd add a tag pair such as the following to the master template for the Articles collection, `article.html`.

```html
<perch:related id="author" collection="Authors" label="Author">
  <p>
    <a href="/authors/<perch:content id="slug" type="slug">">
      <perch:content id="firstname"> <perch:content id="lastname">
    </a>
  </p>
</perch:related>
```

This creates a new field `author` which holds the detail of the relationship. `perch:related` has both an opening and a closing tag. The contents of the tag are used to display the related content. This is like a sub-template, as has its own before and after tags, counters and so on. If multiple related items (authors in this example) are selected, then the template effectively loops to display them all.

The opening tag takes the following attributes:

|Attribute|Value|
|-|-|
|`id`|An ID of your choosing|
|`collection`|The collection to use for the source of the related items|
|`label`|A label for the field for use on the edit form|
|`sort`|A special value of `custom` sorts the items in the order specified in the control panel.|
|`count`|Integer. The number of related items to output. By default, outputs all.|
|`max`|Integer. The maximum number of related items that can be selected when editing content. |
|`scope-parent`| true or false. Bring the content variables outside of the related tag into scope within a `parent.` prefix.|

*Note:* When displaying the edit field, Perch uses the _title_ of the related item. Make sure that the collection uses `title` on one or more fields.

## Displaying related items

The related items can be displayed whenever the primary item is displayed by adding the `<perch:related>` tags to the template. Be sure to specify the same field `id` and `collection` attributes whenever you use the tag.

For example, in a listing of articles:

```html
<perch:before>
<ul class="article-list">
</perch:before>
  <li class="article">
    <a href="/article/<perch:content id="slug" type="slug">">
      <perch:content id="headline" type="smarttext">
    </a>
    <span class="byline">
    <perch:related id="author" collection="Authors">
      - <perch:content id="firstname" type="text"> <perch:content id="lastname" type="text">
    </perch:related>
    </span>
  </li>
<perch:after>
</ul>
</perch:after>
```

If we were expecting multiple authors to be associated with each article, we could adapt the template to display those more gracefully:

```html
<span class="byline">
<perch:related id="author" collection="Authors">
  <perch:before> - </perch:before>
  <perch:content id="firstname" type="text"> <perch:content id="lastname" type="text">
  <perch:if exists="perch_item_last">.<perch:else>, </perch:if>
</perch:related>
</span>
```

## Filtering by related items

The next thing you need to be able to do is to filter by a related item. For example, list all articles by a given author. To do so we use a dot syntax of `perch:related` field ID __dot__ ID of field in related item. In our example, the `perch:related` field has the ID `author` so if we wanted to filter on the author's `lastname` field, we'd use `author.lastname`.

To find all the articles written by an author with the last name "Fry":

```php
<?php
  perch_collection('Articles', [
    'filter' => 'author.lastname',
    'match'  => 'eq',
    'value'  => 'Fry',
  ]);
?>
```
