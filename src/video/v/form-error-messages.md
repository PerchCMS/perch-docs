---
layout: video_youtube.html
nav_groups:
  - primary
title: "Form Error Messages"
video_id: P97xucL0Anc
---
## Video Transcript

In the last video in the series we created a form with a success message. However if you try to submit the form without completing all of the required fields it just reloads, which isn’t very friendly. We can use Perch forms to create clear error states for our form.

I have an HTML document showing my desired error states, if a field isn’t correctly completed I will show a message and also add a class to the container for that label and field pair to highlight it.

Go back to the template contact form.html. I am first going to add my messages if a field isn’t completed. I add an error at the top of the form which will display if any error state happens. I am using a template tag here so the content editor can create their own message.

Below each field I add a perch:error tag wrapping my message. The attributes for perch:error are ‘for’ with a value of the id of the required field and type – in this case required.

Save the template and then go into the admin and hit save on the content of the contact form region to update the template cache. Now go to your form and try and submit it without completing it – the errors will show.

I can also add a second tag for the email field to detect when it has been completed but not with a valid email address. In this case I set the value of type to ‘format’.

So that deals with the error messaging, what about the extra class? Well, you can use these perch:error tags anywhere and multiple times if you want to, so I simply use them to wrap the class for each field.

Submit the form in admin to update the cache then try and submit the form empty or with some missing field and you will see the class is now being added highlighting the problem area.
