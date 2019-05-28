---
title: Perch Configuration
nav_groups:
  - primary
---

There are a number of other settings that control various aspects of how Perch works.

## Perch Config

|Setting|Value|
|-|-|
|PERCH_LICENSE_KEY|Your license key for this site|
|PERCH_DEBUG|True or false. Enables the collection of debug information.|
|PERCH_PRODUCTION_MODE|The production mode to use; PERCH_PRODUCTION, PERCH_STAGING or PERCH_DEVELOPMENT|
|PERCH_SCHEDULE_SECRET|Lowercase letters and numbers secret used for running the scheduled task script.|
|PERCH_UNDO_BUFFER|The number of revisions of a region kept in the history stack so the user can 'undo' a change. Default 30.|
|PERCH_AUTH_PLUGIN|The name of an authentication plugin to use|
|PERCH_SESSION_TIMEOUT_MINS|The control panel session cookie timeout in minutes. Defaults to 20, 1440 would be one day.|
|PERCH_NONPORTABLE_HASHES|True or false. Whether to use more secure non-portable password hashes. Defaults to false so that users can be moved from server to server.|
|PERCH_MAP_JS|A web path to a JavaScript file for overriding the JavaScript used by the Map field type.|
|PERCH_PREVIEW_ARG|The query string parameter used for previewing drafts. Defaults to 'preview'.|
|PERCH_PROGRESSIVE_FLUSH|True or false, true by default. Enables chunked transfer encoding, which is generally beneficial for performance.|

## PERCH_DEBUG

For more information about how to run Perch in debug mode see the support note on [enabling debug](/docs/installing-perch/configuration/debug/).
