---
nav_groups:
  - primary
title: Troubleshooting Tips
---

Perch Support happens in our [forum](https://community.perchcms.com/forum/). Before posting check the following common issues that people encounter, and details of how you can get help quickly.

- [Is Perch and all Add-ons up to date?](#is-perch-and-all-add-ons-up-to-date)
- [Try Perch Debug Mode](#try-perch-debug-mode)
- [Will x Work?](#will-x-work)
- [Try a documentation search](#have-you-searched-the-documentation)
- [Try a forum search](#have-you-searched-the-forum)
- [I have a blank page / white screen / 500 error / cut off HTML output](#i-have-a)
- [I can't login](#i-can-t-login)
- [I have a PHP error](#i-have-a-php-error)
- [My assets are not uploading](#my-assets-are-not-uploading)
- [My images and not resizing / cropping](#my-images-are-not-resizing-cropping)
- [My blog categories are not updating](#my-blog-categories-are-not-updating)
- [I have changed my template but the website isn’t showing the change](#i-have-changed-my-template-but-the-website-isn-t-showing-the-change)
- [Perch isn't using the right template](#perch-is-not-using-the-right-template)
- [None of these helped!](#nothing-here-helped-)

## First things first

### Is Perch and all Add-ons up to date?

If you post to the forum and your software is out of date, the first thing we will do is ask you to update.

To see which version of Perch you are using look at your Diagnostics Report in Perch (under Settings). The versions of Add-ons are also listed there.

If you are not running the latest version, update and see if you still have the problem.

### Try Perch Debug Mode

Perch has a debug mode. It can show you things like which template your content is using. The messages there may well help you solve your problem. If they don’t they will at least help us to help you.

[This article explains how to enable debug](https://solutions.grabaperch.com/development/how-do-i-debug-problems).

### Will x work?

We get a lot of posts that just ask us if doing something in a template is going to work. The best way to find out is to try it for yourself - rather than wait potentially a few hours for us to try it for you.

You won’t break anything, try it and see what happens. It’s the best way to learn.

### Have you searched the documentation?

Every day we reply to queries by going to the Perch documentation, searching for the question that was posted to the forum and then replying with the link.

We are always trying to improve the search of the docs so try searching for phrases that might describe your problem - you might just find the answer.

### Have you searched the forum?

The forum can also be searched. Someone else may have asked the same question and you can use our answer to them.

## I have a:

- Blank page / white screen
- A 500 error
- HTML output that seems to “cut off”

Any of the above indicate that you have a PHP error. If you post to the forum which any of the above we will ask you to take a look in your error log and find the error.

The error log you need is the PHP Error Log - this is not likely to be the same as the web server access log (the one where you see 404 errors etc.).

[This article explains more able how to find your error log](https://www.smashingmagazine.com/2011/11/a-guide-to-php-error-messages-for-designers/).

If you cannot access the log then you need to ask your host, we are going to find it hard to help you if we can’t see the actual error. So do this first before posting and it will save you time.

## I can’t login

You try to log into Perch and are immediately bounced back to the login page with a query string that looks like `?r=%2Fperch%2Fcore%2Fapps%2Fcontent%2F`.

This usually means a problem with Sessions on your server. Either you need to enable PHP Sessions in some way, or if this was previously working it may be that your Sessions folder is full. Either way this is something you will need to speak to you host about.

## I have a PHP error!

PHP errors may be printed directly to the page, or they may be in the error log mentioned in the last step.

### Look at the first error

You often get a whole chain of errors, the first one is the most important (the others may be caused by that first error).

There are some errors that you are likely to see, which fall into a few classes of issues.

### Mismatched Perch and Apps

`PHP Catchable fatal error:  Argument 2 passed to PerchFieldType::__construct() must be an instance of PerchXMLTag`

If you see something like this and recently updated Perch it is likely the App you are using needs updating to match.

### Permissions

`Warning: move_uploaded_file(/home/mysite/public_html/upload/my_cat.jpg) [function.move-uploaded-file]: failed to open stream: Permission denied in /path/to/script.php on line 49`

For some functionality - such as uploading a file or image - Perch will need PHP to be able to write files. If your error says **Permission denied** then you need to find out how to set permissions for PHP to be able to create files.

If you don’t know how to do this for your hosting then your host would be the place to raise a support ticket.

### Headers

`Warning: Cannot modify header information - headers already sent by (output started at /path/to/file.php:12) in /this/file.php on line 28`

Typically you will see this when doing a redirect of some sort. So when logging in a Member with the Members App or redirecting a user to checkout in Shop.

An HTTP response includes headers and a body. In those headers, you can set things like a Location header (a redirect), cookies, all sorts.

The body is typically the content of the file you're sending - so in our case an HTML document.

The trick is, once you stop sending the headers and start sending the body, you can't go back and set new headers. Therefore if you want to do anything that involves setting a header, you need to do it before the page content is output.

You will usually see this error if:

1. You have white space above the Perch runtime include
2. You have white space in your config file
3. Your editor is saving files with a BOM (Byte Order Mark)
4. You're using a page function that redirects the user, but have including HTML output above it

## Database connection errors

Perch needs to connect to your database and needs to have permissions to insert, edit and delete data and also to create and update tables.

### Installing Perch

You can’t install Perch without being able to connect to the database so if you are seeing database connection problems in a new install try the [Perch Compatibility Test](https://grabaperch.com/compat/perch_compatibility_test.zip) or [Runway Compatibility Test](https://grabaperch.com/compat/runway_compatibility_test.zip) first and get that working. Then, use the same details when installing Perch.

Perch needs either PDO or MySQLi installed in order to connect to your database.

### Database problems with an existing site

If a live site suddenly stops connecting to the database and you haven’t changed anything this will *not have anything to do with Perch*. You should contact your host in this instance.

### Allowed Memory Size Exhausted

`Fatal error: Allowed memory size of 67108864 bytes exhausted (tried to allocate 17472 bytes) in /home/mysite/public_html/lib/Image.class.php on line 198`

PHP has run out of available memory.

You might see this if you are trying to upload and process large images - see the details about Assets in this document for more help.

### Old PHP

You will see errors if you try to run Perch or Runway on hosting  with very out of date PHP. Check the [requirements](https://grabaperch.com/requirements) here and use the Compatibility Test to make sure your hosting is capable.

## Any error not mentioned here

If you have some unusual error that we don’t often see then all we will do is stick it into Google to see what it is. You can do that too!

It doesn’t matter if the advice refers to another PHP CMS, they all use the same types of hosting and so the errors are likely to be due to common reasons. Most PHP errors are not going to be something in Perch code as otherwise we would be seeing 100s of the same thing in the forum and would have fixed it. So most likely you will find something you need to raise with your host. If you aren’t sure we are happy to advise in the forums but there isn’t a lot we can do about server related issues outside of Perch.

## My assets are not uploading

We see a range of issues with assets. The vast majority are due to hosting problems.

The first thing to check is whether anything can be uploaded via assets. Use a very small image with a tiny file size, if uploaded from a Perch template tag with a type of image remove anything that might resize the image (such as width and height attributes) we are just testing if we can upload an image at this point.

If you small image uploads fine, but your large image does not then the likely problem is that the PHP max_upload _ size is lower than the size of your image. You can see the limit in your Diagnostics report and will need to ask your host how to increase that limit.

If even a very small image does not upload then it is likely that PHP does not have permission to write to the resources folder or bucket you are trying to upload to. It may be that you need to speak to your host.

If images upload fine of the size required but the failure happens when trying to resize the image see the next step.

## My images are not resizing/cropping

To process images we need either GD or ImageMagick on the server. You can see if you have one or the other in your Diagnostics Report. If you do not have either ask your host to enable one of them.

If you have one of these and are still having a problem try to resize a very small and simple image. If that works but larger and more complex images do not then the issue is that PHP is running out of available memory. This is something that can be increased in theory in your PHP configuration but you may gif that PHP is configured with plenty of memory and this issue still happens. This is due to the fact on shared hosting other sites may well be using up the memory, leaving not enough to do memory heavy operations. This isn’t something we can fix in Perch - if you need to process large images you will need to use hosting with better resources to do so.

## My blog categories are not updating

Perch caches some more expensive operations such as generating blog category lists. This can be a nuisance during development. If you set PERCH_PRODUCTION_MODE to `PERCH_PRODUCTION` in your config then they will not cache and you should see changes immediately.


## I have changed my template but the website isn’t showing the change

To keep your site nice and fast we cache the output of your template plus the content you enter when the content is saved. If you change your template you need to go hit save on that region in admin.

We also have a Republish All button you can click to republish all regions after making a change.

## Perch is not using the right template

First enable Perch Debug and see which template Perch is using for your content.

If this is in an App make sure that you have copied the App templates from the add-on install into perch/templates/app_name_ as described in the docs.

## Nothing here helped!

This is a great time to [post to support](https://community.perchcms.com/forum/) as you have checked some of the common issues people have.

Before posting to support make sure that you can demonstrate your problem in the simplest possible way. For template issues you should remove as much code as possible to still demonstrate the issue. This process of creating a *reduced test case* is important for any debugging. Whether you have a Perch problem or something in your CSS, by removing anything that doesn’t change the problem you make it much easier for someone to help you. In many cases during the process of creating a reduced test case you will find the problem yourself.

Posting hundreds of lines of code to the forum means that you are asking the person helping you to do the work of creating a test case for you. Read [more about reduced test cases on CSS Tricks](https://css-tricks.com/reduced-test-cases/) - getting good at creating these will speed up all of your work, it's the best debugging skill you will learn!

When you post to the forum make sure your post includes:

1. Your Short Diagnostics Report
2. An explanation of what you are trying to do
3. If an error is occurring include the error
4. If something other than what you expected has happened explain what you expected **as well as** what actually happens.
5. Any code - as a reduced test case - to help us reproduce the problem
6. If you have already ruled out any of the things mentioned here or performed any debugging steps - tell us! That will save us asking again.

Posts that include all of the above are very likely to get an answer right away - getting you back to work. If we have to ask repeated questions to get the information, then it will take a lot longer as you won’t be the only person we are helping. So help us to help you and we can get you back to your project quickly.
