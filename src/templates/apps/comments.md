---
title: Comments App
nav_groups:
  - primary
---

## Namespaces

The Perch Comments App uses the namespace `perch:comments` when displaying comments. Comment forms are Perch Forms and use the `perch:forms` namespace.

## Master templates

| Template | Used for |
|-|-|
|comment.html|A comment|

## Default templates

| Template | Used for |
|-|-|
|comment_form.html|A form for collecting new comments|

## Comment template IDs

By default, an comment template includes the following IDs:

| Value | Description |
|-|-|
|`commentID`| The numeric, sequential unique ID for the comment |
|`commentEmail`| The email address of the commenter |
|`commentURL`| The URL for the commenter |
|`commentName`| The commenter's name |
|`commentDateTime`| The date and time at which the comment was left |
|`commentHTML`| The HTML body of the comment |


## Editing templates

The default templates are stored inside the `perch_comments/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_comments/templates/comments` to `/perch/templates/comments` and then make your changes.

If a template has the same name in this folder as the template in the `perch_comments` folder it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template in the function’s options array.

## Usage examples

The Comments app has two main templates – the comment form, and the comment list.

### A Comments Form

The comment form should be a Perch form, and must have an `id` of `comment` to be processed. Tags used for the form elements are defined in the [`perch:form` template documentation](/templates/form/).

```html
<perch:form id="comment" method="post" app="perch_comments">
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
      <perch:input type="hidden" id="parentID" value="<perch:comments id="parentID">">
      <perch:input type="hidden" id="parentTitle" value="<perch:comments id="parentTitle">">
      <perch:input type="submit" id="submitComment" value="Submit">
    </div>
  </fieldset>
  <perch:success>
    <p>Thank you. Your comment has been submitted and will appear on the site once approved.</p>
  </perch:success>
</perch:form>
```

### Comment Listing

A typical template might look like this:

```html
<perch:before>
  <h2>Comments</h2>
  <ul class="comments listing">
</perch:before>
    <li id="comment<perch:comments id="commentID" type="hidden">">
      <img src="//www.gravatar.com/avatar/<perch:comments id="commentEmail" type="email" label="Email" order="2" hash="md5" required>?s=120&d=mm" width="60" height="60">
      <div class="comment">
        <div class="commenter">
          <perch:if exists="commentURL"><a href="<perch:comments id="commentURL" type="url" label="URL" order="3">"></perch:if>
            <strong><perch:comments id="commentName" type="text" label="Name" order="1" required>:</strong>
          <perch:if exists="commentURL"></a></perch:if>
        </div>
        <p rel="bookmark" class="date"><perch:comments id="commentDateTime" format="%d %b %Y %X" type="date" time label="Date"></p>
        <perch:comments id="commentHTML" encode="false" html type="textarea" label="Message (HTML)" order="4" required>
      </div>
    </li>
<perch:after>
  </ul>
</perch:after>
```
