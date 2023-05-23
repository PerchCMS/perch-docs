---
layout: video_youtube.html
nav_groups:
  - primary
title: "Editing Blog Templates"
video_id: HIrKlAeYIFg
collection: video_blog
video_order: 19
duration: "9:18"
desc: Edit the default templates that come with Perch to add in the markup that we want to use to show our posts. 
---

To add the finishing touches to our blog, we will edit the default templates that come with Perch, to add in the markup that we want to use to show our posts. 

As with anything in Perch, the output HTML is completely down to you. Apps will ship with some default templates to get you started, just as Perch itself has default templates. You can use these as-is, edit them or supply your own. We will use the default templates but edit them for our requirements.

## Before changing the default template

The templates for blog are inside the installed blog app at `perch/addons/apps/perch_blog/templates/blog`. Don't edit these directly, instead copy the entire `blog` folder with the templates inside to `perch/templates`.

Now you have a copy of our default templates. What will happen is that Perch with look in your folder first to find a template, using the default names or a template name passed in. If it finds a template here it will use it. If it doesn't it will use the default templates in the app. Therefore, by copying out your templates you have a safe way to make changes that won't be overwritten when you update the blog app.

Something else that's worth understanding is that every one of the official apps has the concept of a **Master Template**. This is a template that contains any fields you want to output, either on this template or on another template. The Master Template will typically represent the detail page of any list of items. For blog the master template is `post.html`. Open `perch/templates/blog/post.html` and you can see all of the fields that appear in the Control Panel when editing a post.

We can now edit the template with the markup and fields for our blog. The completed template markup is shown below, and the video walks through this in detail.

## Fields for use with other templates

You can use the `suppress` attribute to add fields to the Master Template that are not displayed on the main blog post page but are used on other representations of the content. You can see this with the excerpt field in the default template. It doesn't output on the main blog post page but is used in the listings. 

In our case we want to use the excerpt as an intro to the post so we change it to a field that will output by removing `excerpt="true"`. It now displays on the blog page.

The categories are also suppressed as we are using the Perch functions to display these.

```html
<div class="post">
  <div class="hentry">
	  <h1>
      <a href="<perch:blog id="postURL" type="hidden">" rel="bookmark" class="p-name">
        <perch:blog id="postTitle" type="text" label="Title" required size="xl autowidth" order="1">
      </a>
    </h1>
    <time class="dt-published" datetime="<perch:blog id="postDateTime" type="date" label="Date" time format="Y-m-d H:i:s" divider-before="Publishing">">
      <perch:blog id="postDateTime" type="date" time format="%d %B %Y"> 
    </time>
		<perch:if exists="authorGivenName">
      <p class="byline">by <perch:blog id="authorGivenName" type="hidden"> <perch:blog id="authorFamilyName" type="hidden"></p>
    </perch:if>  
    <div class="intro entry-summary">
      <perch:blog id="excerpt" type="textarea" label="Excerpt" markdown order="3" size="s">
    </div>
    <div class="description entry-content">
      <perch:blog id="postDescHTML" type="textarea" label="Post" order="2" editor="simplemde" markdown size="xxl autowidth" required>
    </div>
   </div>
</div>

<perch:categories id="categories" set="blog" label="Categories" display-as="checkboxes" suppress>
  <a href="archive.php?cat=<perch:category id="catSlug" type="slug">" class="p-category">
    <perch:category id="catTitle" type="text">
  </a>
</perch:categories>
```

The key thing to remember with all of these app templates is that there will be a Master Template, and it is here that you need to add any fields you want to use in any template for that content. This includes multiple image sizes. If you want to have a thumbnail for your listing page of a larger image in your blog, add the cropped version here and then use it in your listing template.