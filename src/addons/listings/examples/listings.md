---
title: Display Listings
nav_groups:
  - primary
---

To display the listings (on your `/listings` page perhaps), use:
List the latest added listings
```php
perch_listings_recent_created();
```

List the filtered listings based  on location,price,size
```php
perch_listings_custom(array(
    'filter' =>array( 'listingLocation' => $location,'listingPrice'=>array( $minPrice,$maxPrice),'listingSize'=>array( $minSize,$maxSize)),
    'category' => array('apartment','plot'),
    'template' => 'listings_in_list.html'
));
```
Display specific listing
```php
 if(isset($_GET['s'])){
 
       perch_listing_listing(perch_get('s'));
       
  }
```
