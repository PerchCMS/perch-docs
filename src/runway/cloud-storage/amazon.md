---
title: Amazon S3
nav_groups:
  - primary
---

Use the following procedure to configure a resource bucket for use with Amazon S3.

## Configure

Open up your `perch/config/runway.php` file and look for the Amazon S3 section. It looks like this:

```php
'amazon_s3' => [
    'access_key_id'     => '',
    'secret_access_key' => '',
    'handler'           => 'PerchS3_ResourceBucket',
    'handler_path'      => PERCH_PATH.'/addons/apps/perch_s3/PerchS3_ResourceBucket.class.php',
],
```

Add your S3 Access Key ID and Secret Access Key to the file and save your changes.

## Add a resource bucket

Next, open up your `perch/config/buckets.php` file. By default it is empty. Create a new bucket - we'll call this one `images`

```php
<?php
    return [
        'images' => [
                 'type'      => 'amazon_s3',
                 'region'    => 'eu-central-1',
                 'web_path'  => '',
                 'file_path' => '',
         ],
    ]
```

The `file_path` should be the name of the bucket you wish to use. The `web_path` is the HTTP path to the bucket. The `type` is always `amazon_s3`. The `region` is the [AWS data center](http://docs.aws.amazon.com/general/latest/gr/rande.html#s3_region) that the bucket resides in.

**Example defining two buckets**

```php
<?php
    return [
        'images' => [
                 'type'      => 'amazon_s3',
                 'region'    => 'eu-central-1',
                 'web_path'  => 'https://s3.amazonaws.com/myproject.images',
                 'file_path' => 'myproject.images',
         ],
         'press_releases' => [
                  'type'      => 'amazon_s3',
                  'region'    => 'eu-central-1',
                  'web_path'  => 'https://s3.amazonaws.com/myproject.press',
                  'file_path' => 'myproject.press',
          ],
    ]
```


## Using the CloudFront CDN

If serving page assets (images, fonts, JavaScript etc) from S3, we'd recommend using the CloudFront CDN, as S3 is rather slow. Create a CloudFront distribution in your AWS management console, and then update the `web_path` in your bucket list to use the new CloudFront domain name:

```php
'images' => [
      'type'      => 'amazon_s3',
      'region'    => 'eu-central-1',
      'web_path'  => 'http://abcdefghijk.cloudfront.net',
      'file_path' => 'myproject.images',
],
```

You'll need to add a bucket policy on your S3 bucket to make sure that files added to the bucket are public by default.

```javascript
{
  "Version":"2008-10-17",
  "Statement":[{
    "Sid":"AllowPublicRead",
        "Effect":"Allow",
      "Principal": {
            "AWS": "*"
         },
      "Action":["s3:GetObject"],
      "Resource":["arn:aws:s3:::bucket/*"
      ]
    }
  ]
}
```

Replace the `bucket` in `arn:aws:s3:::bucket/*` with the name of your S3 bucket.
