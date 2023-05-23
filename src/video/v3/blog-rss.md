---
layout: video_youtube.html
nav_groups:
  - primary
title: "Create a Blog RSS feed"
video_id: nnmwWdkIQCE
collection: video_blog
video_order: 22
duration: "8:27"
desc: The blog templates include a template which outputs the post in a format as needed for an RSS feed.
---

The blog templates include a template which outputs the post in a format as needed for an RSS feed. To use it, you will need to create a page just like any other. This will be a blank page though without any of your site design involved. Create that in the blog folder and call it `rss.php`.

The entire code for `rss.php` is below. To see a walkthrough of this code watch the video (which has captions). The code uses a template from the `perch/blog/templates` folder, named `rss_post.html`. The default may well be all you need but you can make changes to it as with any other template.

```php
<?php include('../perch/runtime.php'); ?>
<?php 
    $domain = 'http://'. $_SERVER['HTTP_HOST'];
    PerchSystem::set_var('domain',$domain);

    header('Content-Type: application/rss+xml');

    echo '<?xml version="1.0"?>';
?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Blog | Swift Migrations</title>
        <link><?php echo PerchUtil::html($domain) ?>/blog/</link>
        <description>News from Swift Migrations</description>
        <atom:link href="<?php echo PerchUtil::html($domain) ?>/blog/rss.php" rel="self" type="application/rss+xml">

        <?php 
        perch_blog_custom([
            'template'=>'blog/rss_post.html',
            'count'=>10,
            'sort'=>'postDateTime',
            'sort-order'=>'DESC'
        ]);
        ?>
    </channel>
</rss>
```
