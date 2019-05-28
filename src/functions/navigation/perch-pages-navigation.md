---
title: perch_pages_navigation()
nav_groups:
  - primary
---


To output Navigation to the page use the `perch_pages_navigation` function.

## Parameters


| Type | Description |
|-|-|
| Array   | Options array, see table below |
| Boolean | Set to `true` to have the value returned instead of echoed. |


## Options array

|Name|Value|
|-|-|
|hide-extensions|true/false. Strips the file extension from any links generated.|
|hide-default-doc|true/false. Strips the default document (normally index.php) from the end of the links.|
|template|The name of the template file to be used.|
|skip-template|true/false. Returns a PHP associative array rather than the templated HTML.|
|from-path|The path to the file in the site where the navigation should start. Defaults to /. To use the current page, set to *|
|levels|Integer. The number of levels of navigation to output from the starting point. Omit or use 0 for all.|
|flat|True/false. Outputs a list with all items at the same level - no nesting|
|include-parent|True/false. When outputting a list, include the immediate parent item first.|
|siblings|True/false. Start the navigation with the 'sibling' pages of the page specified by 'from-path'. i.e. 'Show navigation from this level' rather than 'show navigation below this page'.|
|only-expand-selected|True/false. If true, sub-pages are only displayed for currently select pages.|
|add-trailing-slash|True/false. If true, adds a trailing forward slash to the end of the URL. Useful in combination with URL rewriting and the hide-extensions option.|
|navgroup|The slug of a navigation group to use.|
|include-hidden|Include pages that have been set has hidden.|
|from-level|Integer. For use with from-path. Roots the navigation at the given level, regardless of current page depth.|
|use-attributes|True/false, defaults to true. Specifies whether page attributes are loading into the navigation. Setting to false will give you a minor performance boost.|

## Usage examples

Without any options, this will output the entire tree, like a sitemap. That’s useful, but usually not what you’re looking for. The options in the table below can be used to control which parts of the tree are used.

```php
<?php perch_pages_navigation(); ?>
```

The following example display would one level of navigation for the About section of the site. In essence, this is the About section subnav.

It’s created by using the `from-path` option to start the navigation from the About page.

```php
<?php
    perch_pages_navigation(array(
        'from-path' => '/about',
        'levels'    => 1
    ));
?>
```

The full set of options looks like this.

```php
<?php
    perch_pages_navigation(array(
        'from-path'            => '/',
        'levels'               => 0,
        'hide-extensions'      => false,
        'hide-default-doc'     => true,
        'flat'                 => false,
        'template'             => 'item.html',
        'include-parent'       => false,
        'skip-template'        => false,
        'siblings'             => false,
        'only-expand-selected' => false,
        'add-trailing-slash'   => false,
        'navgroup'             => false,
        'include-hidden'       => false,
    ));
?>
```

## Template option

The `template` option takes the name of a template file in the
`perch/templates/navigation` folder. A basic template might look like this.

```html
<perch:before><ul></perch:before>
    <li>
        <a href="<perch:pages id="pagePath">">
            <perch:pages id="pageNavText">
        </a>
        <perch:pages id="subitems" encode="false">
    </li>
<perch:after></ul></perch:after>
```

## Styling navigation

By default, Perch outputs navigation as a series of nested unordered lists. Navigation templates should be kept in the
`perch/templates/navigation` folder. The basic default template is called `item.html`.

When a page in the navigation tree is the current page the
`current_page` variable gets set in the templates. If it’s a page leading to the current page in the site hierarchy, the `ancestor_page`
variable gets set.

For the default template, these are used to set a class of `selected` or
`ancestor` on the `li`.

When viewing `/about/people` the HTML would look like this.

```html
<ul>
<li><a href="/">Home</a></li>
<li><a href="/blog/">Blog</a></li>
<li class="selected">
    <a href="/about/">About</a>
    <ul>
    <li><a href="/about/history/">History</a></li>
    <li class="selected"><a href="/about/people/">People</a></li>
    <li><a href="/about/organisation/">Organisation</a></li>
    </ul>
</li>
<li><a href="/contact/">Contact</a></li>
</ul>
```

The special value `subitems` is used for where the subnavigation for the current item should be inserted. The template is called recursively for each level of navigation required.

It is not necessary to use the same template for each level of navigation, however. You can pass an array of template file names to the template option.

When this is done, the first file is used for the first level of navigation, the second for the second level and so on. If there are more levels than templates, the last template is reused as many times as necessary.

```php
<?php
    perch_pages_navigation(array(
        'template' => array('level1.html', 'level2.html'),
    ));
?>
```

## Advanced use

The `skip-template` option returns a PHP associative array of the raw data for generating your own sort of navigation. When `skip-template` is set, the `perch_pages_navigation` function returns its value rather than outputting it to the page.

```php
<?php
    $navigation = perch_pages_navigation(array(
        'skip-template' => true,
    ));
?>
```

To return the templated HTML for other purposes, pass a second argument of `true`.

```php
<?php
    $navigation = perch_pages_navigation(array(), true);
?>
```

## Hiding extensions

If you use the `hide-extensions` option, you’ll need to configure your server to still find the pages. If you’re using Apache and have mod\_rewrite available, you can often do this in your `.htaccess` file.

The below is an example of how this might be done.

```php
# Redirect to PHP if it exists.
# e.g. example.com/foo will display the contents of example.com/foo.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.+)$ $1.php [L,QSA]
```

**Note:** you may need to disable `MultiViews` if you have it enabled.

## Creating ‘section’ navigation

Often, it’s required to have the same navigation on all pages within a website section, regardless of the level at which those pages sit.

For example, within the ‘About’ section, you may want to show the same subnav, no matter if you’re on the About page, or About/Company, or About/Company/Locations.

You can do this use the `from-level` option, which starts the navigation at the given site level.

```php
<?php perch_pages_navigation(array(
    'from-path'  => '*',
    'from-level' => 1,
)); ?>
```

Use with `'from-path'=>'*'` to put the navigation in the context of the current page, and then `'from-level'` moves up and down the tree to find the starting point.

The `include-parent` option is sometimes useful here, too.
