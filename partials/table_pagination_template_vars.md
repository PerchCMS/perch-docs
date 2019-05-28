|ID|Purpose|
|-|-|
|paging|Set if paging is present. Can be testing for with a perch:if tag.|
|total|The total number of items in the result set.|
|number_of_pages|The number of pages the result set is split into.|
|total_pages|Same as number_of_pages. (Compatibility)|
|per_page|Number of results per page.|
|current_page|The current page in the result set.|
|lower_bound|The first record index on this page.|
|upper_bound|The last record index on this page.|
|prev_url|The URL of the previous page. Empty for the first page.|
|next_url|The URL of the next page. Empty for the last page.|
|prev_page_number|The page number of the previous page. Empty for the first page.|
|next_page_number|The page number for the next page. Empty for the last page.|
|not_first_page|Present and set if the current page is not the first page in the set.|
|not_last_page|Present and set if the current page is not the last page in the set.|
|page_links|The HTML output of the page links template, if enabled.|
|perch_index_in_set|An integer storing the position of this item in the result set, indexed from 1|
|perch_zero_index_in_set|An integer storing the position of this item in the result set, indexed from 0|
|perch_first_in_set|Will be true if this is the first item in the set|
|perch_last_in_set|Will be true if this is the last item in the set|
