---
title: Importing Posts
nav_groups:
  - primary
---

The Blog app includes an importer to move your blog posts from another blog engine. Currently this includes an importer for WordPress and Posterous. If there is demand we can create other import scripts, let us know in the forum if this would be helpful for you.

-   [Instructions for WordPress](#wordpress)
-   [Instructions for Posterous](#posterous)
-   [Template guidelines and tips](#templates)

## Importing WordPress posts {#wordpress}

To import your posts you will need to follow the following steps.

1.  Export your posts from WordPress
2.  Install the blog app into Perch
3.  Import your posts into Perch
4.  Create Perch templates for your posts
5.  Update your .htaccess file if you wish to preserve your WordPress
    URLs

We would strongly suggest you do this on a local or staging copy of your site. If you need help to understand how to set that up see [this solution](/solutions/development-guides/xampp-install/).

### Export your posts

Log into WordPress and select `Tools > Export`. Choose the radio button to export posts. Then click Download Export File to download an xml file of your posts.

### Install the blog app

On the Perch website, download the blog app and install it as described in the installation instructions. You will then have an empty blog install.

Go to the Settings Page in Perch and find the Blog section. Update the Slug Format setting to match how your posts are formatted in WordPress.

### Import your posts

Take the xml file that you downloaded from WordPress and put it into the folder `/perch/addons/apps/perch_blog/import_data`

Then log into Perch admin and go to the Blog app. In the sidebar is a link to import posts. Click this. You should then see a form.

Under import file select your posts xml file.

File Type is WordPress.

You can choose to keep your posts as HTML or Textile. This choice depends a little on how your posts were authored in WordPress. If they were created as HTML (using TinyMCE, for example) you’ll need to continue to use HTML in Perch in order to maintain the formatting.

Posts that were authored largely as plain text (common with older WordPress blogs, which used automatic line break conversion) then you may have some success converting to Textile.

Click the Import button, the import may take a little while if you have many posts.

You should now find your posts and comments imported. Check by comparing the number of posts in Perch and WordPress.

## Importing Posterous posts {#posterous}

When Posterous announced it was closing in 2013, an export of content was made available. Unzip your data export, and you should have a folder called something along the lines of `space-12345678-sitename-abc123def456ghi789`. This is the folder you need to work with below.

### Install the blog app

On the Perch website, download the blog app and install it as described in the installation instructions. You will then have an empty blog install.

Go to the Settings Page in Perch and find the Blog section. Update the Slug Format setting to match how your posts are formatted in Posterous.

Copy the `/perch/addons/apps/perch_blog/templates/post.html` file to `/perch/templates/blog/post.html` and update the main `postDescHTML` tag to remove `textile` and add `html`

(You may find it easiest to use an editor like Redactor, as your posts will all be in HTML.)

```html
<perch:blog id="postDescHTML" type="textarea" editor="redactor" html size="xxl">
```

### Import your posts

Take the `space-...` export folder and put it into the folder

`/perch/addons/apps/perch_blog/import_data`

Then log into Perch admin and go to the Blog app. In the sidebar is a link to import posts. Click this. You should then see a form.

Under import file select your `space-` folder from the list.

File Type is Posterous, and the format is HTML.

Click the Import button, the import may take a little while if you have many posts.

You should now find your posts and comments imported. Check by comparing the number of posts in Perch and Posterous. Note that the Posterous export doesn’t always include all the files you uploaded. Double check for things like PDF files, as we’ve found that those are often not included.

## Create Perch templates for your Blog {#templates}

You can now create your blog pages in Perch. In the blog download are some example pages and I would suggest using these as a basis for your new blog, copying in your design. We have a video that explains how to incorporate blog into your own design.

### Things to note when creating templates

If you have converted your posts to Textile or Markdown these will still contain some html, so your Perch template tag will need to have an `encode="false"` alongside the attribute `textile` or `markdown`. This prevents Perch from encoding the HTML entities. Our default blog template already has this in place.

If you have an automatically created excerpt in your WordPress post listing you can do this in Perch. Before editing the default blog templates remember to copy them to perch/templates/blog then look at `post_in_list.html`

This template assumes that you have added an excerpt when creating your blog post. You can change this to just use the first x words from your blog post by using the following tag.

```html
<perch:blog id="postDescHTML" encode="false" words="50" append=" [...]">
```

If you would like to be able to create excerpts (which tend to read more nicely than automatically generated ones) you can use a `perch:if` statement to show your added excerpt if it exists, and if not show your shortened version of the post. This means you won’t have to go through all of your old posts adding excerpts.

```html
<perch:if exists="excerpt">
  <perch:blog id="excerpt" type="textarea" textile>
<perch:else>
  <perch:blog id="postDescHTML" encode="false" words="50" append=" [...]">
</perch:if>
```

### Update the .htaccess file

By default Perch will link to posts with a querystring. This is because not all servers our Perchers use have mod_rewrite capability, mod_rewrite is what is used to create “friendly” or “SEO friendly” URLs.

If you have mod_rewrite then you can use it to rewrite your Perch URLs. For example to change your blog URLs from:

    http://mysite.com/blog/post.php?s=2012/09/21/my-post-title

to

    http://mysite.com/blog/2012/09/21/my-post-title/

You would add the following line to your .htaccess file.

```
RewriteRule ^blog/([a-zA-Z0-9-/]+)$ /blog/post.php?s=$1 [L]
```

Then in Perch Settings, change your Blog Post Page Path to:

    /blog/{postSlug}/

This will ensure that the links from your listing page are updated. Read more detail about [URL Rewriting for the Blog App](/addons/blog/installation/clean-urls/).

Importing a lot of data can use lots of server memory and take a while to process. In some hosting environments, this can cause the PHP memory limit, or the maximum script time to be reached.

This can particularly be an issue with Posterous imports, and Perch reprocesses all the images. Processing images takes time and memory.

Often, you can adjust the PHP memory limit and timeout. If you can’t do it on your live server, it may be better to run the import on your development server and then upload.

In your `perch/config/config.php` file, you can adjust the limits using

```
ini_set('memory_limit', '256M');
set_time_limit(90);
```
