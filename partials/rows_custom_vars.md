|template|The name of a template to use to display the content.|
|sort|The ID of the field to sort on.|
|sort-order|Either `ASC` (ascending), `DESC` (descending) or `RAND` (random).|
|sort-type|Either `alpha` or `numeric`. Default is `alpha`.|
|count|The number of items to display.|
|start|The item number to start displaying from.|
|filter|The ID of a field to filter the results by.|
|match|Used with filter, see the below table for values|
|value|Used with filter and match. The value to match. For `between` and `in`, takes a comma delimited string. For `regex` takes PCRE regular expression.|
|category|Filter by one or more categories. See [Category filtering](/docs/categories/filtering/)|
|category-match|Either `any` or `all`. See [Category filtering](/docs/categories/filtering/)|
|skip-template|True or false. Bypass template processing and return the content in an associative array.|
|return-html|True or false. For use with `skip-template`. Adds the HTML onto the end of the returned array with key `html`.|
|split-items|True or false. Return an array of individually templated items.|
|raw|True or false. Returns unprocessed content, for use alongside skip-template.|
