---
layout: video_youtube.html
nav_groups:
  - primary
title: "Perch Conditionals - Every"
video_id: 3YT8U757vYw
---

## Perch Conditionals - Every

Sometimes when you are repeating items in a multiple item region you need to insert some markup between every so many items. This pattern happens a lot in the Bootstrap framework, where you need to add row divs around rows of items.

Perch makes this easy to do with perch before and after and the perch:every tag.

I am using a Bootstrap template here for a simple Gallery, and if you look at the source you can see the markup for each image is the same but each set of three items is wrapped in a row.

I have already created a Perch template for my Gallery Items. So lets add in the extra markup needed to get the Bootstrap formatting to work for us.

To start with we need to open up the first row, we can just do this using `perch:before`. This markup will output before all of the items in the multiple item region.

    <perch:before>
      <div class=“row”>
    </perch:before>

Then after the image markup use perch:after to close the div. This will output after all of the items have looped through.

    <perch:after>
      </div>
    </perch:after>

So this will wrap our entire region. We now need to get the closing div and opening new row in every third item.

After the image markup, but before `perch:after` add `perch:every` tags, with a count of 3, inside the tags add your closing `div` and opening `div` with a class of `row`.

    <perch:every count="3">
      </div>
      <div class=“row”>
    </perch:every>

I can now delete all of the place holding markup up my page and add a Perch Region. Then reload the page.

I go into the perch control panel and find my region, choosing the Gallery image template and allowing multiple items. I add four images.

Back on my page I reload and my images have appeared. If I view source you can se the correct markup around the images.
