---
title: Secure Downloads
nav_groups:
  - primary
---

Downloads can be restricted using [resource buckets](/docs/resources/).

If, for example, you had a members site for a club or sports team, you
could have a secure resource bucket into which anything for members only
would be uploaded (AGM minutes, newsletters etc).

You’d then use a short download script to deliver those files to the
browser, and that script would check that the member has permission to
access that bucket.

## Setting up the resource bucket

First, you’ll need to create a new bucket that stores its files outside
the web root. If you don’t have a `perch/config/buckets.php` file,
create one like the example below. The `secure` folder should be above
the `public_html` folder, i.e. outside of your web root.

```php
<?php
return array(
    'secure' => array(
        'web_path'  => '/members/download.php?file=',
        'file_path' => '/path/to/sites/secure',
    ),
);
?>
```

Then you’d need a template for uploading the files in the normal way.
Our bucket is called `secure`, so we use that in our template tag:

```html
<a href="<perch:content id="file" type="file" label="File" order="2" bucket="secure">">
      <perch:content type="text" id="desc" label="Title" order="1" required title>
  </a>
```

On the front end of you site, this will produce a link to something like


    /members/download.php?file=/members_contact_details.pdf

The `download.php` example file included with the app checks that the
member is logged in before streaming the file. You could also check for
a tag, for example. See the source of the `download.php` for an example.
