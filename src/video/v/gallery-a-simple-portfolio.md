---
layout: video_youtube.html
nav_groups:
  - primary
title: "Gallery: a simple portfolio"
video_id: ANBPaIi3BKc
---
## Video Transcript

The site HTML5 UP! has some lovely templates free for your use – I thought these might make great starting points to show how easy it is to combine Perch and modern development methods. In this video I’m using the Parallelism portfolio template.

My starting point is a new install of Perch. I have dropped the base files for Parallelism into the root of my site. I have changed the index.html page in the download to index.php and included the perch runtime include at the top of that page.

I have also installed The free Gallery add-on into Perch, by downloading the add-on and dropping perch_gallery into perch/add-ons/apps.

Then logging into admin so the app will auto install.

I am adding an album named Portfolio, this will store my images.

In my code I need to open perch/config/apps.php and add a line to include the Gallery runtime.

```php
    include(PERCH_PATH.'/addons/apps/perch_gallery/runtime.php’);
```

This makes gallery functions available.

Like all of our apps, Gallery has default templates inside the app folder, to make your own templates you need to copy these templates to perch/templates/gallery and either edit the default templates there or add your own.

The master template for all gallery images is image.html if you open this you will see that by default it creates three sizes of image for each uploaded image plus a description.

For our portfolio we need a large image and the thumb plus a title for the image. So I can edit this template to make that so. We want to constrain images by height as the script that the Parallelism demo uses will work out the widths.

So I am setting a height, but not cropping the image, the width will be set in proportion to my chosen height. The key attribute is important – this is how you will identify the correct size of image in your templates. Each image listed has the same value for id, so that the editor only needs to upload the image once and all required sizes will be created.

Now I need to make the template that will display the thumbs. If I look at the index.php, the file I downloaded from x each item in the gallery is an article element, with an h2, then a link to the full image and the thumbnail.

Each article has the width of the thumbnail as a data-src attribute.

```html
    <article class="item thumb" data-width="282"> <h2>You really got me</h2> <a href="images/fulls/01.jpg"><img src="images/thumbs/01.jpg" alt=""></a> </article>
```

I have created a new file in perch/templates/gallery called album-image.html and pasted in the section of markup relating to an individual image. Then updated that to use the images I specified in my image.html template.

I am using a special value of `small-w` in the data-width attribute as this will get me the all important small image width.

Finally I am editing the template album.html to match the markup used in the small description box in the design.

Now I just need to use Gallery functions to display our gallery.

In index,php delete all of the thumbnails and replace the with a call to perch_gallery_album_images, we are hardcoding the album slug – portfolio – and in the array passing in our custom template.

```php
    <?php perch_gallery_album_images("portfolio", array( 'template'=>'album-image.html' )); ?>
```

In the title and description area use the function perch_gallery_album_details, again passing in the album slug. We have just modified the default template for album details, album.html but you can pass in a custom template if you like.

```php
    <?php perch_gallery_album_details('portfolio'); ?>
```

Save the page and now all you need do is upload some images. Perch will use the image filename as the image alt when you use the batch uploader – that I am also using as a title in my template. You can edit each image to give them a better title.
