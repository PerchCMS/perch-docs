---
layout: video_youtube.html
nav_groups:
  - primary
title: "A Google Map"
video_id: 7-icJJaNa6I
collection: video_getting_started
video_order: 9
duration: "3:58"
desc: Perch makes it really easy to add a Google map to your site. 
---

On our contact page we have a Google map. It shows the company location. Perch makes it really easy to add a Google map to your site. 

The contact page in the starting point files has a Google map embedded. Let's take that out, and instead add a new Perch region. We'll call this one `map`. 

Go back to our page and reload, the map will disappear. Then in the admin, we get our new region map. When selecting a template you can see there is already a map template there. What I'd like to do is edit that default template a little bit before we use it. We find the template in `perch/templates/content`, and you should find in there a file named `map.html`. Open that up, and edit it to look like the below code snippet:

```html
<div class="frame">
    <perch:content id="map" type="map" label="Address" width="560" height="300" zoom="15">
</div>
```

Save the template and then go back to the admin, select the Map template and hit submit. 

You need to set up a Google API key in order to use Google maps. To get your Google maps API key, [visit Google here](https://developers.google.com/maps/documentation/javascript/get-api-key). 

Once you've got your key, add it to `perch/config/config.php` replacing `abc123` with your key.

```php
define('PERCH_GMAPS_API_KEY', 'abc123');
```

The Perch Config file is often used in this way, you can think of it as a place to add settings that don't need to be changed in the CMS.

With your key in place, you can then go back to the Perch admin. Reload the page and you should now be able to search for an address and zoom the map to the location you want to show on the page. We also use the static map tile, so if a visitor doesn't have JavaScript, JavaScript doesn't load, they'll get the static map instead.

