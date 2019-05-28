---
title: Search handlers
nav_groups:
  - primary
nav_sort: 10
---

Perch and Runway implement basic full-text site search functionality. An app can include its data as part of the search by exposing a class which implements the `PerchAPI_SearchHandler` interface and registering it at runtime.

```php
class MyApp_SearchHandler implements PerchAPI_SearchHandler
{
    public static function get_search_sql($key)
    {
        ...
    }
    
    public static function get_backup_search_sql($key)
    {
        ...
    }
    
    public static function format_result($key, $opts, $result)
    {
        ...
    }
}
```

In the app’s runtime.php:

```php
PerchSystem::register_search_handler('MyApp_SearchHandler');
```

## Methods

The interface has three static methods. Two which return an SQL fragment, and one which post-processes a result for display.

### PerchAPI_SearchHandler::get_search_sql(string $key)

Generates and returns an SQL SELECT query for finding data matching the keyword $key. This SELECT is streamlined into a larger query by way of a UNION, and so the number and order of columns in the query matters significantly.

You must select 10 columns, with the first two being source and score.

|Column|Description|
|-|-|
|source|The name of your SearchHandler class. It should be sufficient to use the PHP magic constant `__CLASS__`
|score|A score value (e.g. fulltext index search score) to order the results by. This is going to be an inexact science, admittedly.|

Following those, select up to 8 other columns that will be needed to format a search result listing item. Usually this will be a title, some way of forming a link, and something for an excerpt. If you don’t need 8 items, pad the end of the list with empty quotes items.

```sql
SELECT "MyApp_SearchHandler" AS source, MATCH(...) AS score, 
	itemTitle, itemSlug, itemDateTime, itemDescHTML, itemID, "", "", ""
FROM my_table
```

### PerchAPI_SearchHandler::get_backup_search_sql(string $key)

This is exactly the same as the previous method, but is used if the previous returns no results. The reason is that most search will probably be implemented using MySQL fulltext indexes. These work well with large volumes of data, but behave badly when there’s not much content to search. They also do badly for keywords that are too common in the data, e.g. a company name on their own website.

Whilst this isn’t usually a practical problem for the site visitor (who searches a company site for the company’s name?) it proves extremely confusing for clients and less technical web designers, and causes them to lose time on a project trying to figure out why something simple isn’t working. We don’t want to cause people that frustration, so the backup search sql should use a simpler search method less likely to run into those problems.

We’d recommend using a `REGEXP` query with word boundaries rather than a `LIKE`.

```sql
WHERE itemTitle REGEXP '[[:<:]]bananas[[:>:]]' 
```

### PerchAPI_SearchHandler::format_result(string $key, array $opts, array $result)

After the search query has been run, the search engine runs down the results and calls the format_result method of the handler for each line. This comes from the source column we specified in the SQL. 

The method gets passed three arguments

### Arguments

|Argument|Value|
|-|-|
|key|the search keyword|
|opts|An associative array of search options passed into the system by the page author|
|result|An associative array representing the row selected by the search query|

The method processes the result into an array with the following keys and values.

### Returned array

|Key|Value|
|-|-|
|url|The URL within the site to link to in order to display the found item.|
|title|The title of the found item|
|excerpt|An HTML excerpt of length specified in opts.|
|key|the keyword|

