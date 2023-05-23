---
layout: video_youtube.html
nav_groups:
  - primary
title: "Create a Blog Archive page"
video_id: nE3SZ3cY8DE
collection: video_blog
video_order: 18
duration: "12:08"
desc: The final page of our blog is an archive page, which serves to display posts by category or by tag.
---

The final page of our blog is an archive page, which serves to display posts by category or by tag. Each post has categories and tags which link to a listing of all the posts in that category or tag. Until you set up this page, if you click on these you will get a 404 error - page not found. If you have a look on the querystring, you will see that it contains a parameter and value that we can use to select the right data for our listing page. Just as we did when selecting a post based on the slug.

We've got our `index.php` page which is the blog homepage listing page. I'm going to save that as `archive.php`, because essentially a archive is just like the blog homepage listing. It's a listing of posts, we're just filtering it in a different way. On that main listing we displayed our posts with `perch_blog_recent_posts()`. That's what we used on the homepage. We're going to need to change this. We're going to use the Perch Blog custom function.

Before I start to output the posts, I want to set up some variables to use, because we're going to be filtering and displaying the posts in a few different ways, but there are some things that are going to be common to all of them, so let's set those things up first.

```php
$posts_per_page = 10;
$template = 'post_in_list.html';
$sort_order = 'DESC';
$sort_by = 'postDateTime';

$posts_displayed = false;
```

### Testing for category

If the visitor has clicked a link which has a querystring parameter of `cat`, they are looking for a category archive. We can test for this in PHP and if so retrieve the category details and posts in the category.

I use the `perch_get()` function. If it has a parameter `cat`, I use another blog function `perch_blog_category` passing in the value of `perch_get('cat')`. If my querystring included `cat=relocation` then the value passed into `perch_blog_category` will be `relocation`. The function returns the category title, and we use the parameter through in order to use this in our echoed statement.

```php
if(perch_get('cat')) {
  echo '<h1>Archive of: ' . perch_blog_category(perch_get('cat'),true) . '</h1>';

}
```

Here's a quick test. If we save this and if we head back to our page, now if we click on a category, archive of relocation. It's collected the relocation category from that query string. If we click on, say, 'Employees', archive of employees. Great. So far, so good. What we're doing is we're getting the information about that category back from perch. That's great. We can now output the linked posts for that category.

Still staying inside that 'If', use `perch_blog_custom` with those variables created earlier, and once again the value of `perch_get('cat')`.

```php
if(perch_get('cat')) {
  echo '<h1>Archive of: ' . perch_blog_category(perch_get('cat'),true) . '</h1>';

  perch_blog_custom([
    'category'=>perch_get('cat'),
    'template'=>$template,
    'count'=>$posts_per_page,
    'sort'=>$sort_by,
    'sort-order'=>$sort_order
  ]);

  $posts_displayed = true;
}
```

Having done that, I'm going to say 'Posts displayed equals true', because we actually got a match. We realize that yes, we are working within category.

If you go back to the browser, you should now be able to load posts by category. We then do exactly the same with Tags.

```php
if(perch_get('tag')) {
  echo '<h1>Archive of: ' . perch_blog_tag(perch_get('tag'),true) . '</h1>';
  perch_blog_custom([
    'tag'=>perch_get('tag'),
    'template'=>$template,
    'count'=>$posts_per_page,
    'sort'=>$sort_by,
    'sort-order'=>$sort_order
  ]);
  $posts_displayed = true;
}
```

Someone might, instead of going to archive.php with something on the querystring, they might just visit archive.php. In which case, they're not going to get anything. That's not very friendly, so in that case I'm just going to display the most recent posts. I only do this if `$posts_displayed` still equals `false` as I know that our checked for different types of archives have not matched.

```php
if($posts_displayed == false) {
  echo '<h1>Archive</h1>';
  perch_blog_custom([
    'template'=>$template,
    'count'=>$posts_per_page,
    'sort'=>$sort_by,
    'sort-order'=>$sort_order
  ]);
}
```

You can use `perch_blog_custom` to do all kinds of filtering. For example, a date archive displaying things for each month. You can do that in exactly the same way as we created our 'Tags' and 'Category' archive. If you have a look at the _perch_blog_custom_ function in the documentation, you'll see there's an awful lot of different things that you can pass in.

