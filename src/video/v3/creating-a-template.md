---
layout: video_youtube.html
nav_groups:
  - primary
title: "Creating a Template"
video_id: GCcAd-S8jJY
collection: video_getting_started
video_order: 4
duration: "8:41"
desc: Create the slide area at the top of the homepage.
---

In the last video, we saw how easy it was to edit content on a Perch site using the default templates. The power from Perch really comes, though, when you start to create your own templates with the exact markup you need for your site. So to demonstrate this, we can create the slide area at the top of the homepage. This area uses some JavaScript to switch between the different panels. 

There are various ways in Perch that you can mark this up. However, because we're just getting started let's keep this simple and make each one a region that uses the same template to display the content. Copy out the markup from one of these slides and save it into a new file named `home-slide.html` into `perch/templates/content`. This is the location for any content templates.

Perch templates are always `.html` files, they essentially are snippets of HTML.

With your HTML markup in place you now start to replace the content of the HTML tags with Perch Template Tags. This is how your content becomes editable. All of the tags you can use can be found in the Perch Template documentation. The video walks you through editing this template, you can see the full code of the template below.

```html
<h3><perch:content id="heading" type="smarttext" label="Heading" help="This will form the clickable heading on the slide" required></h3>

<perch:if exists="subheading"><h4><perch:content id="subheading" type="smarttext" label="Subheading"></h4></perch:if>

<img class="border" src="<perch:content id="image" type="image" label="Image" width="520" height="520" crop>" alt="<perch:content id="alt" type="smarttext" label="Image description">">

<perch:content id="body" type="textarea" label="Body" markdown editor="simplemde" size="m" required>
```

Once you have created the template, go back to your page and delete the content that you copied out. Replace it with a Perch Region. Do this for each slide so you end up with three Regions all with different names.

```html
<div class="slideshow">
		<div class="slideshow-inner">
			<div class="slide slide-one">
				<?php perch_content('Slide One'); ?>
			</div>
			<div class="slide slide-two">
				<?php perch_content('Slide Two'); ?>
			</div>
			<div class="slide slide-three">
				<?php perch_content('Slide Three'); ?>
			</div>
		</div>
	</div>
```

Then reload the page in your browser, at which point all of the content will disappear. In the Perch Control Panel you will find three new regions for the homepage. Select the same homeslide template for each of them and complete them with your content.

So that's the start of creating templates with Perch, and if you follow all through these videos you'll find some new tips and tricks in terms of making your templates more useful and coping with different kinds of content.

