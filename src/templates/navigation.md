---
title: Navigation Tags
nav_groups:
  - primary
---

Navigation can be displayed using the [navigation functions](/functions/navigation/). These then use templates to output the results to your page.

## Namespaces

Navigation falls under the page management aspects of Perch and therefore uses the namespace `perch:pages`.

## Templates

Navigation templates can be found in the `perch/templates/navigation` folder.

| Purpose | Template |
|-|-|
| Navigation links | item.html |
| Breadcrumb links | breadcrumbs.html |

## Variables as ID values

| Value | Description |
|-|-|
|pagePath|Link path of the navigation item|
|pageNavText|Navigation text configured for the page|
|pageTitle|The title of the page. (Generally you want to use `pageNavText` in navigation)|
|current_page|True/false. The link being output is for the page currently being viewed|
|ancestor_page|True/false. The link being output is an ancestor of the page currently being viewed|
|subitems|If there are links to display below the current link, those are inserted here|
|pageOrder|The numerical ranking of the page amoungst its siblings|
|pageDepth|The level in the navigation tree for this page|
|pageTemplate|The file path of the master page used by the page|

Values set by page attributes are also available within the template, using the IDs from their corresponding attribute templates.

## Navigation items and subitems

The [navigation functions](/functions/navigation/) call the `item.html` template recursively for each level of a navigation tree. That means the template is processed over and over again for each branch of the tree, with the next level down being inserted at the point of the `subitems` tag:

```html
<perch:pages id="subitems" encode="false">
```

As the subitems have already been run through the template and are HTML, we use `encode="false"` so that the HTML isn't double-encoded.

You can test to see if the current page has subitems by using `perch:if`

```html
<perch:if exists="subitems">
    class="has-children"
</perch:if>
```

### Item template

The default navigation item templates does a lot of work in just a few lines of markup. It's best to think of the template being run for each _level_ of navigation in the tree - even if you're only displaying one level.

```html
<perch:before>
    <ul>
</perch:before>
		<li<perch:if exists="current_page"> class="selected"</perch:if>
			<perch:if exists="ancestor_page"> class="ancestor"</perch:if>>
            <a href="<perch:pages id="pagePath">"><perch:pages id="pageNavText"></a>   
            <perch:pages id="subitems" encode="false">
        </li>
<perch:after>
    </ul>
</perch:after>
```
For each _level_:

1. The `perch:before` section is output if this is the first link in the level
2. We consider each page in turn:
	1. If the link is for the page currently being viewed, it's given a class of `selected`
	2. If the link is for a parent or grandparent of the current page, it's given a class of `ancestor`
	3. We output the link
	4. If the page has another level to show below it, output the `subitem`
3. Once all the links are done, the `perch:after` section is output