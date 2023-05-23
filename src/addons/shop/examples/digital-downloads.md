---
title: Selling digital downloads
nav_groups:
  - primary
---

If you are selling digital products, you will need to offer the customer some way to see and download their purchases after checkout. You may even want to make this part of an account area where customers can return and access products they've purchased in the past.

## Listing the files the customer has purchased

You can use the `perch_shop_purchased_files()` function to output a list of files the customer has purchased, sorted by product the files belong two. (For example, if the use has purchased an ebook, they might have available files in Epub and Mobi format.)

```php
<?php
  perch_shop_purchased_files();
?>
```

The default template used for the listing is `shop/products/files_list.html`. You can copy and edit this template, or specify your own.

```php
<?php
  perch_shop_purchased_files([
    'template' => 'my_template.html',
  ]);
?>
```

## Setting up the resource bucket

You;ll need to create a new bucket that stores its files outside the web root. If you don’t have a `perch/config/buckets.php` file, create one like the example below. The `secure` folder (or whatever you choose to call it) should be above the `public_html` folder, i.e. outside of your web root, so that customers can't download the file without paying.

```php
<?php
  return [
    'secure' => [
      'web_path'  => '/shop/deliver/',
      'file_path' => '/path/to/sites/secure',
    ],
  ];
?>
```

One your bucket is configured, update your copy of the `shop/products/file.html` template to add your bucket to the file upload field

```html
<perch:shop id="file" label="File" type="file" order="2" bucket="secure">
```

The items in the listing will typically link to a special page for delivering the secure download.

```html
<a href="/shop/deliver/1234">Download</a>
```

## The secure download page

Your download page needs to read in the file ID from the URL, check that the customer has permission to access the file, and then deliver it.

For example, if your page route is `shop/deliver/[i:file]` then the following would be all that is required.

```php
<?php
  // config
  $url_param 	 = 'file';

  // Check a member is logged in and has purchased the file
  if (perch_member_logged_in()) {
    if (perch_shop_customer_has_purchased_file(perch_get($url_param))) {
      perch_shop_download_file(perch_get($url_param));
    }
  }

  exit;
```
