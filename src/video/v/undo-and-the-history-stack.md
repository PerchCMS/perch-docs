---
layout: video_youtube.html
nav_groups:
  - primary
title: "Undo and the History Stack"
video_id: Pa014Y2507Y
---
## Video Transcript

This video explains how Undo works in Perch. If you have made a change to some content in Perch and spot a problem, you can click the Undo button. 

You can click this button multiple times, and step back through your old content.

This works because Perch maintains a history stack. This 'Undo Buffer' is set to 30 items by default. So Perch will store 30 revisions of each region before older ones start to be removed.

You can control the size of the stack in the Perch config file, by adding a setting `PERCH_UNDO_BUFFER` and choosing a value.

A large Undo Buffer shouldn't cause any problems on most hosting. Where it can confuse people is where Assets are concerned. We have to store any images or files used in your content until they drop out of the history stack. So these files will remain until that happens - otherwise we wouldn't be able to Undo.

If you want images to disappear more quickly then you can reduce the size of the stack in order that they will drop out sooner. 
