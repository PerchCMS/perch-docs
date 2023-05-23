---
title: Perch Blog
nav_groups:
  - primary
---

## Namespaces

Perch Blog uses the namespace `perch:blog`.


## Master Templates

| Template | Used for |
|-|-|
| post.html | A blog post |
| post_meta.html | Meta and open graph tags for a post |
| author.html | A blog author |
| blog.html | A blog (Perch Runway) |
| section.html | A blog section |
 
## Default Templates

| Template | Used for |
|-|-|
| post_in_list.html | A listing of blog posts |
| author_list.html | Listing authors | 
| author_name.html | Displaying the name of an author |
| comment.html | A listing of comments |
| comment_form.html | A new comment form |
| meta_head.html | HTML meta tags for the head of a post page |
| rss_post.html | A post in an RSS feed |
| section_list.html | A listing of blog sections |

## Template IDs

The different types of templates have different fields supplied with them. These can typically be customised, with new fields easily added to the appropriate master template. By default, the following IDs are specified in the default templates supplied with the add-on.

### Post template IDs

By default, an author template includes the following IDs:

| Value | Description |
|-|-|
|`postTitle`| The title of the post |
|`postURL`| The URL of the post |
|`postSlug`| The URL-safe _slug_ for the post |
|`postDateTime`| The date and time at which the post was published |
|`postDescHTML`| The HTML for the body of the post |
|`postTags`| A string of tags assigned to the post |
|`postStatus`| The post status - Published or Draft |
|`authorGivenName`| The first name of the post author |
|`authorFamilyName`| The last name of the post author |
|`authorEmail`| The email address of the post author |
|`authorSlug`| The URL-safe slug for the post author |

### Author template IDs

By default, an author template includes the following IDs:

| Value | Description |
|-|-|
|`author_image`| An image for the author |
|`authorGivenName`| The author's first name |
|`authorFamilyName`| The author's last name |
|`authorSlug`| A URL-safe slug for the author |
|`author_biog`| An extended biography/description for the author |
|`author_twitter`| The author's Twitter handle |
|`author_facebook`| The author's Facebook profile URL |


### Blog template IDs

By default, an blog template includes the following IDs:

| Value | Description |
|-|-|
|`blogTitle`| The title of the blog |
|`blogSlug`| A URL-safe slug for the blog |


### Section template IDs

By default, an section template includes the following IDs:

| Value | Description |
|-|-|
|`sectionTitle`| The title of the section |
|`sectionSlug`| A URL-safe slug for the section |
|`sectionPostCount`| A count of the number of posts within the section |

### Comment template IDs

By default, an comment template includes the following IDs:

| Value | Description |
|-|-|
|`commentID`| The numeric, sequential unique ID for the comment |
|`commentEmail`| The email address of the commenter |
|`commentURL`| The URL for the commenter |
|`commentName`| The commenter's name |
|`commentDateTime`| The date and time at which the comment was left |
|`commentHTML`| The HTML body of the comment |


## Editing Templates

As with Perch content the blog uses templates. The default templates are stored inside the `perch_blog/templates` folder however you should not edit these directly.

To modify templates copy the templates from `/perch/addons/apps/perch_blog/templates/blog` to `/perch/templates/blog` and then make your changes. If a template has the same name in this folder as the template in the `perch_blog folder` it will be used rather than the default. You can also create your own templates with any name you like and pass in the name of the template when using `perch_blog_custom`.

### Adding fields to use in other templates

By default any field you add to the post.html template will appear on the page. If you just want to add a field so that it appears in admin and may be used by another template then add the variable `suppress` to the field. It will then appear in admin to be completed by the user but not display when post.html is used.

The excerpt in the default `post.html` is a good example of this. The below creates a field that does not display when `post.html` is used but is used instead on `post_in_list.html`.

```html
<perch:blog id="excerpt" type="textarea" label="Excerpt" editor="markitup" markdown order="1" suppress size="m">
```



## Usage examples

Using a blog variable in your template. To show the post title use:

```html
<perch:blog id="postTitle" type="text">
```
