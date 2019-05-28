---
title: Map
nav_groups:
  - primary
---

Using `type="map"` embeds a Google Map in the page. The editor can search for a location, position and zoom the map, set the map type and place a pin on the map.

### Adding your Google Maps API key

To set your Google Maps API key for use with the fieldtype, add it to your `perch/config/config.php` file:

```php
define('PERCH_GMAPS_API_KEY', 'abc123');
```

### Attributes for type map

|Attribute|Values and description|
|-|-|
|width|Integer. The width of the map on the page.|
|height|Integer. The height of the map on the page.|
|zoom|Integer. The default zoom level|

```html
<perch:content id="map" type="map" label="Address" width="400" height="300" zoom="15">
```

## Maps and Responsive layouts

The map container needs to have dimensions in order for the Google Maps JavaScript to be able to plot the map. This is why the map has width and height attributes.

If your site is responsive, you may want to make the map flexible. You can do this if Perch is in RWD mode.

1.  Add `define('PERCH_RWD', true);` to your `perch/config/config.php` file
2.  Remove the height and width from your map template tag
3.  Save your map
4.  Add CSS to your site to give the map container a default width and height (it gets given the class `cmsmap`)

If you don’t follow that final step of giving the map a default width and height, **nothing will display**.

If your site has responsive images, you may also need to reset this within the map container. If you don’t, the controls like zoom and Street View may not display correctly.

```css
.cmsmap img {
    max-width: auto;
}
```

## Showing and hiding maps

Due to the way the Google JavaScript works, if your map isn’t on screen when the page loads, it doesn’t display correctly when it’s then shown. This happens, for example, if the map is in a set of tabs. When the user switches to the tab the map is on, it shows but the layout is messed up.

To combat this, Perch adds a JavaScript method you can call to refresh the maps and get them working again.

```js
CMSMap.UI.refresh();
```

This should be called when the map is displayed. For example, if using Bootstrap tabs, you might do something like this:

```js
$('.nav-tabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    CMSMap.UI.refresh();
});
```

## Using your own map display code

If you want something radically different from what the Map field type provides, you’d be best to create a new field type to do that. If, however, there’s some small aspect you wish you could tweak (like adding custom markers, or changing the behaviour slightly) then it may be enough to switch out the default JavaScript for your own.

You can do that by adding the following to your
`perch/config/config.php` file:

```php
define('PERCH_MAP_JS', '/path/to/your/script.js');
```

If doing so, the simplest approach is to take a copy of our `public_maps.js` script and modify it to suit your needs. Remember to store it outside of the `perch/core` folder so it doesn’t get overwritten on update.
