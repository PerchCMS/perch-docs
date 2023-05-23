---
layout: video_youtube.html
nav_groups:
  - primary
title: "A Contact Form"
video_id: 2fDOmsoOJJM
---

The final part of our contact page is a form. We can use Perch to manage this form.

To process forms in Perch you need to install the free forms add-on. Download this now from the add ons section of the Perch site and unzip the archive.

Place the perch_forms folder into `perch/addons/apps`

Open `perch/config/apps.php` and add a line to this file to include the app runtime. This is how you install all Perch official apps. Next time you log into the Perch admin Perch will create the tables that this app needs. You will also get a new option - Forms.

The display of a form is just like any other content template in Perch, so let's create that template.

Copy the form HTML from contact.php and create a new template `perch/templates/content/contactform.html`

Edit this template to use perch:form tags and regular perch content for the various fields.

At the bottom of the form add perch content for the success message - this will only be shown if the form is successfully completed but this will show up in admin to be edited.

 Go back to contact.php, delete the form placeholder content and add a Perch Region.

Reload the page in the browser to see the form disappear and then reload your Perch admin. Select the new Region and choose your contact form template.

You can now add content for the heading and success message.

Save the region and go back to your page - the form has now appeared. Complete all of the fields and send the form, you should see your success message.

Now go back to admin and click the Forms option. Your form will now display here. You can view individual responses and also download data as a csv. 

If you wish to have form responses sent via email then set this up in the form options.

In the next video I will show you how to add error messaging to a form.