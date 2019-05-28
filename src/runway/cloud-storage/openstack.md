---
title: OpenStack Object Storage
nav_groups:
  - primary
---

Use the following procedure to configure a resource bucket for use with an OpenStack Object Storage compatible API such as Rackspace CloudFiles or Memset Memstore. Here we'll use the example of configuring a bucket for Rackspace Cloud Files.

## Configure

Open up your `perch/config/runway.php` file and look for the OpenStack Object Storage section. It looks like this:

```php
'openstack_object_storage' => [
    'username'     => '',
    'password'     => '',
    'tenantid'     => '',
    'endpoint'     => '',
    'region'       => '',
    'handler'      => 'PerchOpenStack_ResourceBucket',
    'handler_path' => PERCH_PATH.'/addons/apps/perch_openstack/PerchOpenStack_ResourceBucket.class.php',
],
```

Add your configuration settings. For example for Rackspace, you'd use something like this


|Setting|Value|Example|
|-|-|
|`username`|Rackspace user account username|`bridgetjones`|
|`password`|Rackspace user account password (not an API key)|`abc-123-def-456`|
|`tenantid`|Your Rackspace account number|`123456789`|
|`endpoint`|Authentication service endpoint URL|`https://lon.identity.api.rackspacecloud.com/v2.0`|
|`region`|Geographical region code|`LON`|

For Memset Memstore, you'd use settings like the below. Note, `tenantname` rather than `tenantid` in this case.

|Setting|Value|Example|
|-|-|
|`username`|Memstore user account username|`bridgetjones`|
|`password`|Memstore user account password|`abc-123-def-456`|
|`tenantname`|Memstore account nane|`msjonesaa1`|
|`endpoint`|Authentication service endpoint URL|`https://auth.storage.memset.com`|
|`region`|Geographical region code|`reading`|

Obviously, being a broader API with lots of different implementations, getting the right incantation to authenticate with your provider of choice can take a little bit of experimentation.

## Add a resource bucket

Next, open up your `perch/config/buckets.php` file. By default it is empty. Create a new bucket - we'll call this one `images`

```php
<?php
    return [
        'images' => [
                 'type'      => 'openstack_object_storage',
                 'web_path'  => '',
                 'file_path' => '',
         ],
    ]
```

The `file_path` should be the name of the container you wish to store the files in. The `web_path` is the HTTP path to the container. The `type` is always `openstack_object_storage`.

**Example defining two buckets**

```php
<?php
    return [
        'images' => [
                 'type'      => 'openstack_object_storage',
                 'web_path'  => 'http://abc123def456.r50.cf3.rackcdn.com',
                 'file_path' => 'myproject.images',
         ],
         'press_releases' => [
                  'type'      => 'openstack_object_storage',
                  'web_path'  => 'http://efg123hij456.r50.cf3.rackcdn.com',
                  'file_path' => 'myproject.press',
          ],
    ]
```

## Using a CDN

If serving page assets (images, fonts, JavaScript etc) from Object Storage, we'd recommend using the CDN service that is often paired with it. Set up the CDN service for the container you're sharing, and then update the `web_path` in your bucket list to use the new CDN domain name.
