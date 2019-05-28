---
layout: video_youtube.html
nav_groups:
  - primary
title: "Perch 2.3 and Repeaters"
video_id: bXRexA6qDxA
---
## Video Transcript

Repeaters are a new feature in Perch 2.3. Here is a quick overview of how to use them.

My fictional migrations company have decided to bundle up their services as packages. So they will have essentially a menu of services. I have created a template with a title and description and added a couple of packages.

Now I need to add the individual items within the package. I could ask my client to add the items using Textile or add a WYSWYG editor but it is likely the content would get a bit messy. So I will use the new repeaters feature so they can add a number of items inside each repeated region.

I edit my template. I will put the items in a list so I add my opening and closing list items.

Repeaters are like a mini template inside a multiple item region, so I can wrap these in perch:before and after tags.

I then use the new repeater tag giving it an ID and label.

Inside the repeater I add my mark-up for the repeated area.

Saving the template I can go back to edit my packages. Adding the items one at a time. I can reorder them using drag and drop.

Going back to my page I now have a multiple item region containing repeated content.

That’s repeaters!