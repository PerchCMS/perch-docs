---
title: Resource Buckets
nav_groups:
  - primary
---

Perch 2.1 introduced the ability to have multiple places in which to store resources. We call these resource buckets – you can think of them as multiple resource folders.

## Basic buckets

The resource bucket to use can be set on any individual template tag using the `bucket` attribute.

```html
    <perch:content id="report" type="file" label="Annual report PDF" bucket="reports">
```

Without any configuration, you can use a bucket name as above. If that bucket doesn’t exist, it will be created as a subfolder of the default resources folder. In this case, `/perch/resources/reports/`. You can create that folder yourself, or Perch will do it for you.

## Setting a default bucket

You can declare any of your buckets as the default from your `config/config.php` file.

```php
define('PERCH_DEFAULT_BUCKET','images');
```

## Bucket list

For more advanced use, you can define a bucket using the bucket list. This is a PHP configuration file which you need to create as `perch/config/buckets.php`

A bucket list item has a name (max 16 characters) and defines the following:

|Key|Value|
|--|--|
|type|The type of bucket. Defaults to `file` for basic buckets, and uses values like `amazon_s3`, `dropbox` etc for cloud storage.|
|web_path|The path (either absolute or from your website root) to use when creating links to images and files in the website.|
|file_path|The file system path to the folder where the files are saved.|
|role|If set, can have the value of `backup` to indicate that the bucket is used for backups only.|

Specific bucket types may also define additional properties as per their own documentation. For example, Amazon S3 buckets need a `region` option setting.

An example bucket list takes this format. It defines three buckets, `images`, `whitepapers` and `backup`.

```php
<?php
    return [
        'images' => [
            'type'      => 'file',
            'web_path'  => '/images',
            'file_path' => '/var/www/mysite/public_html/images',
        ],
        'whitepapers' => [
            'type'      => 'file',
            'web_path'  => '/whitepapers',
            'file_path' => '/var/www/mysite/public_html/whitepapers',
        ],
        'backup' => [
            'type'      => 'dropbox',
            'web_path'  => '',
            'file_path' => 'backups',
            'role'      => 'backup',
        ],
    ];
?>
```

Using the bucket list, you could define a bucket which stored files outside of the web root, and then delivered them using a script. This can be used to, for example, only give access to a file to someone who is authorised to view it. You would set the `web_path` to be a path to your script. The file name will be appended to it, so it could be e.g. `/secure-download.php?file=`

