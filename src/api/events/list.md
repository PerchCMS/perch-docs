---
title: List of events
nav_groups:
  - primary
---

Currently, Perch core fires the below events. Individual add-ons can also fire their own events, so if you're looking to integrate with a particular app, you should check the list of events included with that app's documentation.

## Regions

|Event|Description|
|-|-|
|region.add_item|An item has been added to the region|
|region.truncate|Items have been deleted from a region (such as converting a multi-item region to a single-item region)|
|region.share|The region has been marked as shared|
|region.unshare|Shared status has been removed from the region|
|region.create_revision|A new revision of the region has been created|
|region.publish|The region has been published|
|region.index|The region has be reindexed|
|region.undo|The undo function has been called to roll the region back to a prior state|
|region.cleanup|The cleanup routine has been run on the region to identify and delete any unused assests|
|region.update_permissions|Permissions have been updated on the region|
|region.create|A region has been created|
|region.delete|The region has been deleted|

## Region items

|Event|Description|
|-|-|
|item.delete|An item has been deleted|
|item.clear_resources|The assets logged against this item have been unlogged (usually prior to deletion)|
|item.log_resources|Assets for the item have been logged|

## Collections

|Event|Description|
|-|-|
|collection.add_item|A collection item has been created|
|collection.create_item_revision|A new revision of the item has been created|
|collection.publish_item|An item in the collection has been published|
|collection.cleanup|The cleanup routine has been run on the collection to identify and delete any unused assests|
|collection.publish|The entire collection has been published|


## Pages

|Event|Description|
|-|-|
|page.create|A page has been created|
|page.update_permissions|Permissions on the page have been updated|
|page.publish|The page has been published|
|route.updated|A page route has been updated (Runway)|

## Categories

|Event|Description|
|-|-|
|category.create|A category has been created|
|category.update|The category has been updated|

## Assets

|Event|Description|
|-|-|
|assets.upload_image|An image file has been uploaded|
|assets.create_image|A new image variant has been created (e.g. a thumbnail based on the uploaded original)|


## Email

|Event|Description|
|-|-|
|email.send|An email has been sent|

## Backup

|Event|Description|
|-|-|
|backup.run|A backup has been run|

## Users and Authentication

|Event|Description|
|-|-|
|user.login|A Perch control panel user has logged in|


## Runtime events

The following events are fired at page runtime, rather than by the control panel.

|Event|Description|
|-|-|
|page.loaded|The page has been loaded|

We're always happy to add new events if there's something your code needs to listen for. Post a [suggestion to the forum](https://community.perchcms.com/forum/) with the event you'd like added, and your use-case for adding it and we'll do our best to help.