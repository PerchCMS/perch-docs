---
title: Event hooks
nav_groups:
  - primary
nav_sort: 5
---

Perch uses a publisher/subscriber model of custom events to enable loose interaction between add-ons without each needing to know about the other. The control panel fires events as the system is used and is content updated. Your code can listen for these events and react to them. For example, you can listen for the `page.published` event and run some custom code (like clearing a cache) when a page is published. All without the page publishing code needing to know anything about your add-on.

You can also fire your own custom events for either your own code, or other people's code to be able to listen for. The Perch Shop app fires an event when an order is placed - you can write code to listen for that event and do something else accordingly.

### Listening for an event

There are broadly two types of events. Control panel events are fired when something happens as a result of the user editing content and generally using the Perch control panel. Runtime events happen as a result of a visitor doing something on your site (such as buying a product in your store).

Both types take the same approach, but are just declared in different places.

Register your content panel event listeners in your app's `admin.php` file. Runtime events should go in your app's `runtime.php` file.

```php
$API = new PerchAPI(1.0, 'my_app');

$API->on('region.publish', function(PerchSystemEvent $Event){
	// A region has been published!
});
```

The callback function is passed a `PerchSystemEvent` object containing the details of the event. In the above example, where the event is assigned as `$Event`, the following properties are available:

|Property|Description|
|-|-|
|event |the name of the event called (`region.publish` in this example)|
|subject |the item the event was called on. This will usually be an object such as a Region or a Page, depending on the event. The subject can be interrogated for details.|
|args |an array of any subsequent arguments passed to the event|
|user |a User object representing the logged in user (control panel events only)|

You can also listen for a special wildcard event name `'*'` which will be called for all events. Can be useful for logging, but be very careful as this code will be called very frequently.

```php
$API->on('*', function(PerchSystemEvent $Event){
    // An event has been fired
    // It was: $Event->event
});
```

### Firing an event

You should only fire your own events, never someone else's.

```php
$API->event('my_app.did_something', $this);
```

The `event()` method takes a variable number of arguments:

1. Event name (_required_) see naming requirements below
2. The subject of the event, e.g. `$this` from within a class
3. Any number of additional arguments, which will be available as `PerchSystemEvent::$args`

### Naming your event

* Event names should contain only letters, numbers, underscores and dots.
* Prefix the event name with the name of your app, followed by a dot 
* Use an active verb in preference to a past tense verb where possible, e.g. *post_create* not *post_created* (like a mouse event - *onclick* not *onclicked*)
* Use underscores to separate words, and dots to create heirarchy
* The entire event name must be max 64 chars

**Examples:** 

```php
my_app.product.update
my_app.product.stock_level.reduce
my_app.feed.create
my_app.user.avatar.delete
```




