---
layout: video_youtube.html
nav_groups:
  - primary
title: "Create a Blog Detail page"
video_id: ce0sMWQb0m0
collection: video_blog
video_order: 17
duration: "10:47"
desc: This time we are creating the blog detail page to display a single blog post.
---

This time we are creating the blog detail page. As with the listing page, the starting point will be an HTML page already designed and coded. As we already know how we want the blog to look, we need to make the page dynamic using Perch functions.

I save my HTML page as `post.php` into the `blog` folder that is in the root of the site. This page needs the Perch runtime include so we can start to use Perch. If you go back to the listing page in your browser and click on any of the blog posts, they will now load up our `post.php` page in the browser with the hardcoded content in place. The pages load with a querystring on the end. The querystring has a parameter `s` and then a value, which is the slug of our blog post. The slug identifies the actual post. 

In a later video I will explain how to rewrite the querystring to create a 'friendly URL', however whether you've got rewritten URLs or a querystring on the URL, as far as the web server is concerned you're using a querystring. Our querystring has a name of `s` and the value is what comes after the equals sign.

It is the value after the `=` that we want to use to identify our post. When we load this page for each individual post we need to look and see which post this is, get the content from the database, and then load the content into this page.

First thing I'm going to do is get that value off the querystring. I need to do that inside PHP. I'm going to create a php variable called `post_slug` in which to store the value of `s`. Perch has a nice little function that will help you do this called `perch_get`. If you pass the name of the querystring paramter into `perch_get` it will return the value and store it in our variable.

```php
$post_slug = perch_get('s');
```

Look in the Perch Documentation and find the Blog function `perch_blog_post`, this will display a single blog post. The function can either look up a post from the `id` or `slug`. We've got the post slug, so can use that. In the example in the documentation you can see that the `perch_get` function is used directly as the value passed into `perch_blog_post`, this is a fine approach too. Because we're going to use it in a few different places I've written it to a variable.

In the document find where the post is displayed, and take out the hard coded post, replacing it with the function, using our slug variable.

```php
<?php perch_blog_post($post_slug); ?>
```

If you now click through to an individual post you should see the unique content. It doesn't look quite how it did before. Again, we've not changed our templates yet but you can see we've got the post.

So you only have one actual blog post page and it loads the content of all of the individual posts. We can now use our variable, along with some of the other blog functions to add the other elements of a blog detail page. These are of course all optional.

## The post title

One thing you might want to do is add the title of your blog post into the title element of the page. That's good for SEO to be able to show what the actual unique title is for the page. We can do that with another function. There's a function called `perch_blog_post_field` which you can use to pick out a field from your template. Find `perch_blog_post_field` in the documentation. The parameters you need to pass in are the slug as before and the name of the field you want to get the content of, in this case `title`

You need to make sure that this field does exist in your template and is going to contain content, I would make this a required field. Other things you might want to do, we've got some information and that appears about the categories and the tags that our post is in. You can see we've got this here. We've got categories and we've got tags. Once again, we've got some handy functions you can use to get that information.

## Post categories and tags

In `post.php`, under categories I remove all the information including the heading. We can use `perch_blog_post_categories` to ouput the categories that this post is in. This is different to `perch_blog_categories` which output all the categories used in the blog. This is the one for the specific post which is why it's `perch_blog_post`. Once again we can add our post slug in here to identify which post we arew showing information for. In addition to categories we've got tags which works in exactly the same way except instead of asking for `perch_blog_post_categories` we will use `perch_blog_post_tags`.

Once you've done that go back to the page, reload and scroll down. You cshould see the categories and the tags showing up for this particular post. We're starting to build up the blog functionality. 

## Post comments

The blog app uses comments. You can have a comment form, and a comment listing. Once again you've got some handy functions just to pull that out onto the page.

It's probably not surprising to you now that what we need to do is remove the comments that we've got here and add a function that will pull in our comments. This time we're going to use `perch_blog_post_comments` to display the comments for this particular post. Once again we pass in the `post_slug` variable.

You can also pass in an array as the second argument and that's the same for the majority of Perch functions. You can pass in extra options as an array. To see how that works let's say we only want to show ten of the comments that are available. We add a count to the array, with a value of the number of comments to display. That would give us ten comments. If you go to the documentation you can see all of the different things that you can add there. 

Next replace the hardcoded form with `perch_blog_post_comment_form`. Again, we need to pass in the post slug so that any comments that are added will be attached to this particular post. 

That's the basics of creating our page. The complete PHP for this page is below.

```html
<?php include('../perch/runtime.php'); ?>
<?php 
$post_slug = perch_get('s');
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php perch_blog_post_field($post_slug, 'postTitle'); ?> | Blog | Swift Migrations</title>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/favicon.ico">
</head>

<body class="blog">
    <nav class="site-navigation" role="navigation">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="team.html">Team</a></li>
            <li class="selected"><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <header class="site-header" role="banner">
        <h1 class="site-title"><a href="index.html">Swift Migrations</a></h1>
        <h2 class="site-description">Helping you get your flock from A to B</h2>
    </header>
    <div class="masthead">
        <div class="masthead-inner">
            <h2>An intro to the blog</h2>
            <p>Our team are based in locations around the world. Some migrate mid-year to better serve seasonal locations.</p>
        </div>
    </div>
    <div class="main" role="main">
        <div class="primary-content">
			
				<?php perch_blog_post($post_slug); ?>

				<div class="meta" role="complementary">
					<div class="cats">
						<?php perch_blog_post_categories($post_slug); ?>		            
					</div>
					<div class="tags">
						<?php perch_blog_post_tags($post_slug); ?>
					</div>
				</div>
				
				<?php perch_blog_post_comments($post_slug,[
				  'count' => 10
				]); ?>
				
				<?php perch_blog_post_comment_form($post_slug); ?>
			
		</div>
		<aside class="sidebar" role="complementary">
            <div class="module">
                <h2>Archive</h2>
                <?php perch_blog_categories(); ?>
            </div>
        </aside>
    </div>
    <footer class="site-footer">
        <div class="footer">
            <div class="vcard">
                <h2>Contact Swift Migrations</h2>
                <p class="fn org"><a href="/" rel="me">Swift Migrations</a></p>
                <div class="adr">
                    <p class="street-address">The Old Church</p>
                    <p class="street-address">123 Letsbe Avenue</p>
                    <p class="locality">Smalltown</p>
                    <p class="postal-code">NE1 4TV</p>
                    <p class="country-name">United Kingdom</p>
                    <p class="email"><a href="mailto:madeup.email@perchdemo.com">madeup.email@perchdemo.com</a></p>
                    <p class="tel value">+44 (0) 1628 633301</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/modernizr.js"></script>
</body>
</html>
```

