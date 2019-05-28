---
title: Create AMP versions of your blog posts
nav_groups:
  - primary
---

AMP (Accelerated Mobile Pages) is a way to build versions of your pages optimized for speed. AMP pages are just another text format – like HTML or RSS. Perch is really great at editing any kind of text format, due to the fact we don’t spit out markup that you don’t ask for. That makes it a straightforward process for you to fully benefit from using AMP on your site. In this article I take a look.

I’m following the excellent [Getting Started Guide](https://www.ampproject.org/docs/get_started/create.html) for AMP. I’m going to create an AMP version of my blog posts, using Perch Blog.

## Create a page

Your blog will already have a page which acts as a container to pull in the blog post that you are currently displaying – if you used our default files for Blog that will be post.php. This page loads with the content for the current post. Create another page in the same location called amp.php – this will perform the same function but for AMP pages.

If you are using Perch Runway create this as a master page, then create a page at the same level as your post.php in the Perch control panel using this master page. When creating that page also create a route – similar to the one for your blog post.php – that references this AMP page.

For Perch just add the page to the same folder as your blog post page, and if you are rewriting URLs with an .htaccess file make sure that you add a rule for amp.php, in the same way you did for post.php. You should now be able to access that page in a browser.

As a test, access the page with one of your blog slugs on the querystring or as part of the URL. So if your blog post is at:

```
mysite.com/blog/my-nice-post
```

You should be able to go to:

```
mysite.com/blog/amp/my-nice-post
```

and not get a 404 error. To check your routes or rewrite rules are working, you could try and read the value from the URL query string. For example if you (as in our example Blog files) rewrite to a query string that looks like:

```
amp.php?s=my-nice-post
```

You can check you can read that slug by adding to your new amp.php page:

```php
<?php echo perch_get('s'); ?>
```

You should see the slug printed out to the page. (You can remove this once you’ve seen it working.)

Now copy the boilerplate content from Create Your AMP Page into this page. We’ll get your Perch Blog content into this.

## Tell Perch which article to load

We now need to do a similar job to that achieved by your post.php, we need to get the slug that identifies this post from the query string, and then get all of the post contents. However rather than use our default blog template, we’ll use a specific one with the AMP tags rather than HTML tags.

To pass in a different template we’ll use perch_blog_custom(). At the very top of your page, after the Perch runtime include (if you have one) add.

```php
<?php
$post = perch_blog_custom(array(
  'filter'        => 'postSlug',
  'match'         => 'eq',
  'value'         => perch_get('s'),
  'skip-template' => true,
  'return-html'   => true,
));
?>
```

I’m not immediately passing this into a Perch template, instead I am storing the contents in a variable called `$post`.

If you want to see what is in $post then enable debug in Perch or Runway and add the following line to your page:

`<?php PerchUtil::debug($post); ?>`

You should then see the contents of this variable which should be an array of all of the information for the post referenced by this slug. Now we need to get this information into the AMP format.

## The AMP header

We will start with the required information in the header. This is detailed in the Getting Started Guide and we can populate our AMP template with the data from our $post variable.

Inside the PHP tags, after the section we created above add the following.

```php
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$title  = $post[0]['postTitle'];
$url    = $domain . $post[0]['postURL'];
$date   = date('c', strtotime($post[0]['postDateTime']));
$html   = $post['html'];
```

What I am doing here is writing the values from the array stored in $post to nice neat variables. You can then use these values to replace the placeholder content in the head of the AMP document. I’ve also created a variable called $html – we’ll come back to that later.

```html
<head>
  <meta charset="utf-8">
  <title><?php echo PerchUtil::html($title); ?></title>
  <link rel="canonical" href="<?php echo PerchUtil::html($url, true); ?>">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "<?php echo PerchUtil::html($title, true); ?>",
        "datePublished": "<?php echo PerchUtil::html($date, true); ?>"
      }
  </script>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
</head>
```

The final thing we need to do is to get the actual content of your post into an AMP template.

## Create a template

Your AMP template will need to contain all of the Perch template tags that you use to output a post – this might include Blocks, Repeaters or other elements. The easiest way to start is to take your Blog master template – post.html, save it as amp.html and start editing from there.

You may well want to simplify the markup as your AMP page can only use a limited subset of CSS and so markup you have added to enable styling of your page may not be relevant.

Key things to check are that where you include images, video or iframes you change your HTML markup into AMP markup. There are also specific instructions for embedding third party content such as tweets.

For example, if you are including an image in your template instead of:

```html
<img src="<perch:blog id="image" type="image" width="320" height="240" crop label="Image" order="4">" alt="<perch:blog id="postTitle">">
```

You will need to use:

```html
<amp-img src="<perch:blog id="image" type="image" width="320" height="240" crop label="Image" order="4">"
alt="<perch:blog id="postTitle">" height="<perch:blog id="image" type="image" width="320" height="240" crop label="Image" output="h">"
width="<perch:blog id="image" type="image" width="320" height="240" crop label="Image" output="w">">
</amp-img>
```

Note that things need to have a size set in AMP so this includes your images. Perch has the sizes of the generated image so you can output the width and height, which you may not be doing in your regular HTML template. I have added these to the example above.

If you are using responsive images in Perch then check on the Getting Started site to find out how to change your markup in order that it will work for AMP. It really is just a case of modifying your templates. Perch gives you the ability to output various information about your images including the sizes.

## Template the post

Go back to the top of your page where we used perch_blog_custom() and add a final option to the array:

```html
<?php
$post = perch_blog_custom(array(
  'filter'        => 'postSlug',
  'match'         => 'eq',
  'value'         => perch_get('s'),
  'skip-template' => true,
  'return-html'   => true,
  'template'      => 'blog/amp.html',
));
?>
```

As the value of template pass in the template you just created. You can then simply output the value of html to your page between the `<body>` tags in the AMP document.

`<?php echo $html; ?>`

We get this special rendered version of our post because we passed in return-html with a value of true when writing our post to a variable. This means we only need do one call to the database to get content as an array to play with plus our templated content to display.

## View your page

You should now have an AMP version of your post and can work through the rest of the Getting Started Guide in terms of using CSS, and adding other features. When validating your page be sure to disable Perch debug as AMP won’t be so keen on that output.

If you have used media on your page you may find you need to make larger changes to your templates, however as long as you have used structured content in Perch it should be relatively straightforward to create AMP versions of any template and render using that.

Once you are ready to make your AMP pages live, don’t forget to add the link to the head of your regular blog post, so that devices know you have an AMP version.

##Taking this further

Your next step might be to create AMP versions of other content, if you are creating pages with regular Perch content then you would use perch_content_custom() to get and re-template the content, however the process is the same. If I were doing several different pages of content then I would probably create an AMP Perch Layout, and use layout variables to pass in the title, URL and so on in order to save repeating the same markup in each page.
