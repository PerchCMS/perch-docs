---
title: Bucket handlers
nav_groups:
  - primary
nav_sort: 2
---

Uploaded assets are stored in resource buckets, which are managed through the user's bucket list. Perch has support for buckets on the local file system, whereas Perch Runway adds support for buckets on Dropbox, Amazon S3, CloudFiles and so on. You can add support for alternative backends using a bucket handler.

## When to use

You would use a bucket handler when you wanted Runway to be able to store resources (assets, backups and so on) on a different type of storage backend. Runway can write to the local or network file system, and includes handlers for Dropbox, Cloudfiles and Amazon S3. If you wanted to add a new service, you'd need a bucket handler.

## How to use

Interally, Runway uses [PHP streams](http://php.net/manual/en/book.stream.php) to read and write to a wide variety of file systems. If the service you need to integrate with already has PHP stream wrappers available, then the process of making it available in Runway should be very simple. If stream wrappers aren't available, you may have to write one yourself, which isn't hard and is quite interesting.

There are a couple of steps to using a different bucket handler. The first is to add a bucket to your `config/buckets.php` file with your handler specifed as the `type`. The second is to define the handler with the `config/runway.php` file.

For this example, let's take an imaginary cloud storage service called CloudSquirrel. In the `config/runway.php` file, we'd add a definition for our template handler:

```php
'cloudsquirrel' => [
	'access_token' => 'abc123squirrel',
	'handler'      => 'CloudSquirrel_ResourceBucket',
	'handler_path' => PERCH_PATH.'/addons/apps/my_cloudsquirrel/CloudSquirrel_ResourceBucket.class.php',
]
```

This sets an access token, the name of the handler class, and the path to the handler on the file system. You can set any setting or credientials that are needed here and that vary from site to site.

## The Resource Bucket class

You then need to add your class with the name and location specified in the configuration. The class needs to extend `PerchResourceBucket`.

The job of the resource bucket class is to represent a single instance of a resource bucket. When it is instantiated, it is passed the configuration details from the `buckets.php` file for the bucket it is supposed to represent.

If the service you're integrating with alreadt has a PHP SDK that includes stream wrappers, your class just needs to act as the glue to make sure the stream wrapper is configured and registered. This is best done in the contructor.

```php
class CloudSquirrel_ResourceBucket extends PerchResourceBucket
{
	public function __construct($details)
	{
		parent::__construct($details);

		// Get the config from the runway.php file
		$config = PerchConfig::get('cloudsquirrel');

		// Initialise the SDK you're using - this is pseudo code:
		$client = new CloudSquirrelSDK($config['access_token']);
		$client->register_stream_wrappers();


		// Update the file path for the bucket to use the right stream protocol
		$this->file_path = 'cloudsquirrel://'.$details['file_path'];
	}

	public function ready_to_write()
	{
		return true;
	}
}
```

The `ready_to_write()` method can be implemented, but for remote file systems may involve too much overheader. We've found it's better to pretend to always be ready, and then let the error handling at the next stage deal with any issues.

The `PerchResourceBucket` class has lots of other methods for reading and writing files which you could overwrite in your class if necessary. However, the beauty of the stream wrapper system means that you shouldn't need to do so. It should all just work!