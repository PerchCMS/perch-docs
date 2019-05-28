---
title: Assets
nav_groups:
  - primary
---

Assets is a Core Perch App that was first included in Perch 2.5. It provides a central place for Assets to be stored and enables their reuse around the site.

## Privileges for Asset Management

When configuring a Role you can select to give that Role the ability to upload new Assets. In some circumstances you might want to populate a site with images and just allow editors to select from those images rather than upload new ones, for example.

## Asset removal

Assets stay in the library for one of the below three reasons:

* The Asset is in use in content - "in use" does not mean "displaying on the site". It could be that the Asset is in an old revision and so maintained to enable that Region to be rolled back.
* When uploading the Asset you (or the editor) selected "Mark as Library Asset" so the Asset remains as one to be selected from.
* The Asset has been uploaded for less than 24 hours and so has not been cleaned up yet.

After 24 hours assets that are not marked as Library Assets and not in use will be deleted from disk.

If you have Admin Privileges you can forcibly delete Assets by going to the individual Asset and clicking Delete. **This may result in broken images on your site or a broken and confusing rollback history** so we would suggest you do not do this unless you absolutely have to ensure a file is gone - for legal reasons for example.

## Asset Thumbnails

Perch creates a nice thumbnail preview of images but it is also possible to have a thumbnail of PDF files and even video automatically created.

Thumbnailing of non-image assets does require that you have certain libraries installed on your server. These are reasonably common, and if you have control of your hosting are a simple install with packages for most operating systems. These are as follows:

* [ImageMagick](http://www.imagemagick.org/) – even if you use GD for image thumbnailing we need ImageMagick available for none-image Assets.
* ghostscript – for PDF files (we’ve found the libmagickwand-dev package on Debian/Ubuntu to be the easiest way to get this working)
* [ffmpeg](http://sourceforge.net/projects/ffmpeg-php/) – for video

If you don’t have these things then Assets will still work fine for you. You’ll just not get the thumbnails.

ImageMagick creates thumbnails by passing out the work to other software on the server that understands the file format in question. It doesn’t know how to deal with things like PDFs, but it knows a man who can, so it silently subcontracts that job out to ghostscript behind the scenes. In the same way, it delegates the job of thumbnailing video files to ffmpeg. Using this technique it should be able to thumbnail almost anything, provided a delegate has been configured that understands how to make an image from that type of file.

In common with everything we do at Perch, we assume that you have the bare minimum of things available to you and then enhance the functionality if you do happen to have the libraries required. However this is a nice little feature when you do have support and if you are developing a site that uses a lot of PDFs for example, it might be worth specifying hosting that will give you the ability to thumbnail them.
