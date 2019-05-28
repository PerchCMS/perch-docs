---
layout: video_youtube.html
nav_groups:
  - primary
title: "Repeating Regions"
video_id: XRgMNLx6SpE
collection: video_getting_started
video_order: 12
duration: "5:32"
desc: Use a repeating region to display multiple items of content.
---

Our team page displays all of the company employees. As the business owner, you might want to add, remove or reorder the employees at any time. To enable this, we can use what we call a Repeating Region in Perch. In this video we work on the 'Team' page which should be changed to a `.php` page and have the Perch Runtime added.

I then create a template `employee.html` containing the markup for a single team member as used on our html page.

```html
<div class="article vcard">
	<h3 class="fn n">
		<span class="given-name"><perch:content id="givenname" type="text" label="Given name" required title></span>
		<span class="family-name"><perch:content id="familyname" type="text" label="Family name" required title></span>
	</h3>
	<p class="meta role"><perch:content id="role" type="text" label="Role" required></p>
				
	<div class="img">
		<img class="border" src="<perch:content id="image" type="image" label="Upload image" width="400" height="400">" alt="<perch:content id="givenname" type="text"> <perch:content id="familyname" type="text">">
	</div>
				
	<div class="description">
		<perch:content id="bio" type="textarea" label="Biography" markdown editor="simplemde" required size="m">
	</div>
</div>
```

Then we add a Perch Region to the Team page, removing all of the hardcoded content.

```php
<php<?php perch_content('Team'); ?>
```

Reload the page and in the Perch Control Panel set up that region using the `employee.html` template.

This time, I'm going to set "allow multiple items" on this template. This will mean that we can complete an employee and then _Save and add another_.

For small amounts of content editing all on one page like this might be good. For larger amounts of content go into Region Options and uncheck "Edit all on one page". Which will give you list and detail editing. In this case the title that you click on to get to each item is made up of any items in your template that have `title`, in our case `givenname` and `familyname`.

Something that's worth noting is that if you decided to upgrade a Perch site to Runway, you can turn a region, a repeating region like this into a collection. So that's a very nice upgrade path for sites where you thought there was only going to be a small amount of content, and suddenly, you're finding that these regions are getting very, very large. Perch by design expects a relatively small site, Runway is designed for these larger sites with huge amounts of content.

Moving an overgrown Region of items to Runway would make them perform better because of the architectural changes in Runway, and you can do that very, very simply by importing a region into a collection.



