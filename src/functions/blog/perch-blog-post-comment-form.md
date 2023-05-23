---
title: perch_blog_post_comment_form()
addon: perch_blog
nav_groups:
  - primary
---
Display a comment form for the given post.

## Requires

- The Blog App installed

## Parameters

| Type | Description |
|-|-|
| ID or Slug | the ID or slug of your post |
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|template|The form template to use.|

## Usage examples

The first argument must be either the ID of a post, or a unique post slug. Usually this will have been passed on the URL from a blog listing page.

```php
<?php perch_blog_post_comment_form(perch_get('s')); ?>
```

An options array can be used. In this case we are passing in an alternate template.

```php
<?php
perch_blog_post_comment_form(perch_get('s'), array(
    'template' => 'comment_form.html',
));
?>
```

Pass `true` as the last argument to return the value rather than echoing it.

```php
<?php
$comment = perch_blog_post_comment_form(perch_get('s'), array(
    'template' => 'comment_form.html',
), true);
?>
```

### Note: The form template

The comment form template must include a Perch form with `id="comment"` for the app to pick it up and process it as a comment.

```html
<perch:form id="comment" method="post" app="perch_blog" class="comment-form" action="<perch:blog id="postURL">">
    <fieldset>
       <legend>Leave a comment</legend>
        <div>
            <perch:label for="commentName">Name</perch:label>
            <perch:input type="text" id="commentName" required label="Name" antispam="name">
            <perch:error for="commentName" type="required">Required</perch:error>
        </div>
        <div>
            <perch:label for="commentEmail">Email</perch:label>
            <perch:input type="email" id="commentEmail" required label="Email" antispam="email">
            <perch:error for="commentEmail" type="required">Required</perch:error>
            <perch:error for="commentEmail" type="format">Check format of address</perch:error>
        </div>
        <div>
            <perch:label for="commentURL">Website</perch:label>
            <perch:input type="url" id="commentURL" placeholder="http://" label="URL" antispam="url">
        </div>
        <div>
            <perch:label for="commentHTML">Comment</perch:label>
            <perch:input type="textarea" id="commentHTML" required label="Message" antispam="body">
            <perch:error for="commentHTML" type="required">Required</perch:error>
        </div>
        <div>
            <perch:input type="hidden" id="postID" value="<perch:blog id="postID">">
            <perch:input type="submit" id="submitComment" value="Submit">
        </div>
    </fieldset>
    <perch:success>
        <p>Thank you. Your comment has been submitted and will appear on the site once approved.</p>
    </perch:success>
</perch:form>
```
