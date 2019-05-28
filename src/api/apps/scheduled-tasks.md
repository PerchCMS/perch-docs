---
title: Scheduled tasks
nav_sort: 5
nav_groups:
  - primary
---

Perch includes a centralised system for scheduling tasks. Apps (and dashboard widgets) can make use of this by adding a `scheduled_tasks.php` file to their app folder.

## Scheduling a task

When the task scheduler runs, it looks through each app’s folder for a file called `scheduled_tasks.php`. An app can register one or more tasks with a call to `PerchScheduledTasks::register_task`

```php
PerchScheduledTasks::register_task('app_id', 'task_key', $minutes, 'function_to_run');
```

### register_task arguments

|Argument|Value|
|-|-|
|app_id|The ID of your app.|
|task_key|An identifier for this task. (e.g. update_tweets)|
|minutes|Integer: the frequency, in minutes, of this task.|
|function|A callable function to run, so either a function name as a string, or an array of object, method.|


The function is called with one argument – the date and time this task last ran.

## Return values

The function you nominate to be called must return an associative array with the results of the task.

### Return array

|Key|Value|
|-|-|
|result|OK, WARNING or FAILED|
|message|A human readable description of the result. This is displayed to the user in the Settings section, to help them fix problems. Max 256 chars.|


## Example

A basic example of a `scheduled_tasks.php` file might look like this.

```php
<?php
    PerchScheduledTasks::register_task('my_app', 'download_rss', 60, 'my_app_download_rss');
    function my_app_download_rss($last_run_date)
    {
        if (MyApp::download_rss()) {
            return array(
                'result'=>'OK',
                'message'=>'RSS successfully fetched.'
            );
        }else{
            return array(
                'result'=>'FAILED',
                'message'=>'RSS could not be fetched.'
            );
        }
    }
```
