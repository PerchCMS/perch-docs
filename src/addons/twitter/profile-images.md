---
title: Profile Images
nav_groups:
  - primary
---

The Twitter API returns a URL to the user's profile image. Perch stores that URL, but if the user later updates their profile image the stored URL can become invalid and the link to the image breaks.

In order to get the new URL and restore the link, Perch would need to go back to the Twitter API to fetch the updated URL. That only happens when an editor uses the Perch control panel, so can be a problem if an image breaks and nobody notices.

A simple way around that is to not reference the URL Twitter gives back at all, but instead to use an intermediary cache that is designed to serve the most recent version without breaking.

## Cloudinary

The online image management service [Cloudinary](http://cloudinary.com/invites/lpov9zyyucivvxsnalc5/uznblf3qtvfg1arzkway) provides one such intermediary service, and has free accounts that would be suitable for most uses. By caching and serving Twitter profile images from their CDN, you can be confident that you always have a recent profile image to display on your site, and you may well also see performance gains.

To use Cloudinary, you need to [sign up for a free account](http://cloudinary.com/invites/lpov9zyyucivvxsnalc5/uznblf3qtvfg1arzkway), whereby you'll be given a _cloud name_. Enter this cloud name in the field inside the Settings section of the Twitter app. For tweets added after that point, profile images will reference a Cloudinary URL instead of the original Twitter URL.
