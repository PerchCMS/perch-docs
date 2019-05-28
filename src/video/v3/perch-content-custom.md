---
layout: video_youtube.html
nav_groups:
  - primary
title: "The perch_content_custom function"
video_id: ymLwez-ZdIA
collection: video_getting_started
video_order: 14
duration: "6:47"
desc: Display some random testimonials on the home page. 
---

On our home page there are a couple of testimonials. Something you might like to do is have a whole list of testimonials, and display two at random on the home page.

I start by creating a Testimonials page which lists testimonials. This is regular Perch Content, set as a Repeating Region and using the below template, saved as `perch/templates/content/testimonial.html`.

```html
<div class="article">
	<h3 class="fn n">
		<span class="given-name"><perch:content id="givenname" type="text" label="Given name" required title></span>
		<span class="family-name"><perch:content id="familyname" type="text" label="Family name" required title></span>
	</h3>
	<p class="meta role"><perch:content id="role" type="text" label="Role and Company" required></p>
				
				
	<blockquote class="description">
		<perch:content id="quote" type="textarea" label="Quote" textile editor="markitup" required>
	</blockquote>
</div>
```

Having added a few testimonials you can then display them on the homepage - two at a time selected at random - using a different template.

The homepage template is `perch/templates/content/_home_testimonial.html`. You can see the complete template below. It needs to use fields that exist in the main template for this content, so be sure to copy them correctly. By starting the template with an underscore it is hidden from the template list when setting up a new region.

```html
<div class="testimonial">
	<blockquote>
		<perch:content id="quote" type="textarea" label="Quote" textile editor="markitup" required>
	</blockquote>
	<p class="byline"><perch:content id="givenname" type="text" label="Given name" required title> <perch:content id="familyname" type="text" label="Family name" required title>, <perch:content id="role" type="text" label="Role and Company" required></p>
</div>
```

To display our content using this template we will use the `perch_content_custom()` function. It allows you to get some Perch Content and do more processing on it.

The function takes the name of the region we want the content from and also an array. Inside the square brackets which denote an arrat we have a set of options and values. You can see all of the possibilities in the documentation for `perch_content_custom()`. In our case we pass in the page the region is on, the template we want to use, a value from the template to sort on, the `sort-order` which is `RAND` for random, and a count of 2.

```php
<?php perch_content_custom('Testimonials',[
  'page' => '/testimonials.php',
	'template' => '_home_testimonial.html',
	'sort' => 'familyname',
	'sort-order' => 'RAND',
	'count' => 2
]); ?>
```

This kind of set up and array with options and values is pretty much all of the PHP that you need to do for Perch, you'll see the same kind of syntax for other `_custom` functions such as `perch_blog_custom`.

