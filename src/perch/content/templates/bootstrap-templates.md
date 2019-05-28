---
title: Using Bootstrap with Perch
nav_groups:
  - primary
---

**Can I use Bootstrap with Perch?**

Bootstrap is a popular CSS framework that can help you to rapidly develop responsive sites. In this solution I take a look at how to build Perch templates for the various components.

Perch is ideally suited for working with a framework like Bootstrap. Bootstrap requires that you add classes to your markup in order to make use of the various component styles. A CMS like Perch that allows you to create templates with the exact HTML that you need makes this easy.

You use Bootstrap by including the Bootstrap CSS and JavaScript. For this solution I have used the [Bootstrap Basic Template](http://getbootstrap.com/getting-started/#template), loading the files from the CDN. With Bootstrap included in my pages I can add Perch Regions to test out my templates.

<p class="text-center"><a href="https://github.com/PerchCMS/perch-bootstrap-templates" class="btn btn-success"><i class="glyphicon glyphicon-arrow-down"></i> Download the templates</a></p>

## The jumbotron

![Jumbotron via Perch](https://static.grabaperch.com/solutions/bootstrap-templates-jumbotron.png){.img-thumbnail}

The [jumbotron](http://getbootstrap.com/components/#jumbotron) is a large header area that can be used as a call to action. My template adds the header and body along with a link styled as a button.

```html
    <div class="jumbotron">
      <h1><perch:content id="heading" type="text" label="Heading" required title></h1>
      <perch:content id="content" type="textarea" label="Content" required markdown editor="markitup">
      <p><a class="btn btn-primary btn-lg" role="button" href="<perch:content id="link" type="text" label="Link" required>"><perch:content id="linktext" type="text" label="Link text" required help="Text for the button, keep it short but try to avoid using click here!"></a></p>
    </div>
```

## The Page Header

The [Page Header](http://getbootstrap.com/components/#page-header) component gives you a header and subtext style. I have made the subtext optional using Perch Conditionals.

```html
    <div class="page-header">
      <h1><perch:content id="heading" type="text" label="Heading" required title>
      <perch:if exists="subtext">
        <small><perch:content id="subtext" type="text" label="Subtext"></small>
      </perch:if>
      </h1>
    </div>
```

## Thumbnails

![Thumbnails created by Perch](https://static.grabaperch.com/solutions/bootstrap-templates-thumbnails.png){.img-thumbnail}

[Default Thumbnails](http://getbootstrap.com/components/#thumbnails-default) just give you a grid of images. I contain the grid within `perch:before` and `perch:after` tags and then set this region to **Allow Multiples** when selecting the template in the Perch Control Panel.

```html
    <perch:before>
				<div class="row">
    </perch:before>
    <div class="col-xs-6 col-md-3">
      <a href="<perch:content id="link" type="text" label="Link" required>" class="thumbnail">
        <img src="<perch:content id="image" type="image" label="Image" width="171" height="180" crop>" alt="<perch:content id="alt" type="text" label="Alt text" title>">
      </a>
    </div>
    <perch:after>
      </div>
    </perch:after>
```

[Custom Content Thumbnails](http://getbootstrap.com/components/#thumbnails-custom-content) can contain other content, and I’ve created a template that matches the example on the Bootstrap site.

```html
    <perch:before>
      <div class="row">
    </perch:before>
    <div class="col-xs-6 col-md-4">
  	  <div class="thumbnail">
  		  <img src="<perch:content id="image" type="image" label="Image" width="242" height="200" crop>" alt="<perch:content id="alt" type="text" label="Alt text">">
    	  <div class="caption">
    		  <h3><perch:content id="heading" type="text" label="Heading" required title></h3>
    		  <perch:content id="content" type="textarea" label="Content" required size="s" markdown editor="markitup">
  			  <p><a href="<perch:content id="link" type="text" label="Link" required>" class="btn btn-primary" role="button">
  				<perch:content id="linktext" type="text" label="Link text" required help="Text for the button, keep it short but try to avoid using click here!">
  			  </a></p>
  		  </div>
  	  </div>  
    </div>
    <perch:after>
      </div>
    </perch:after>
```

## Media Object

![Media Object created by Perch](https://static.grabaperch.com/solutions/bootstrap-templates-media.png){.img-thumbnail}

The [Media Object](http://getbootstrap.com/components/#media) is for building components that feature a left or right aligned image along with some other content.

```html
    <div class="media">
      <a class="pull-left" href="<perch:content id="link" type="text" label="Link" required>">
        <img src="<perch:content id="image" type="image" label="Image" width="64" height="64" crop>" alt="<perch:content id="alt" type="text" label="Alt text">" class="media-object">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><perch:content id="heading" type="text" label="Heading" required title></h4>
        <perch:content id="content" type="textarea" label="Content" required size="s" markdown editor="markitup">
      </div>
    </div>
```

## Panels

![Panels created by Perch](https://static.grabaperch.com/solutions/bootstrap-templates-panels.png){.img-thumbnail}

The [Panel](http://getbootstrap.com/components/#panels) Component means you can put content in a box. The Panel can optionally have a header and footer and there are also ways to give Panels contextual styles. My first template is just a simple panel with a header and an optional footer.

The `perch:if` conditional ensures that we do not get empty footer markup if the content editor doesn’t enter footer content.

```html
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><perch:content id="heading" type="text" label="Heading" required title></h3>
      </div>
      <div class="panel-body">
        <perch:content id="content" type="textarea" label="Content" required size="m" markdown editor="markitup">
      </div>
      <perch:if exists="footertext">
        <div class="panel-footer">
          <perch:content id="footertext" type="text" label="Footer text" help="An optional footer for the panel">
        </div>
      </perch:if>
    </div>
```

### Contextual Panel Headings

Bootstrap gives a list of classes that can be applied to a panel instead of `panel-default`. These will [give the panel some context](http://getbootstrap.com/components/#panels-alternatives).

In order that content editors can choose which type of Panel to create we can give them a drop down list in the Perch Control Pane when editing this content, using the Perch template tag with a type of [select](http://docs.grabaperch.com/docs/templates/attributes/type/select/).

![Perch Admin](https://static.grabaperch.com/solutions/bootstrap-templates-admin.png){.img-thumbnail}

Select takes a list of options, and you can separate a friendly name for the option - that will be displayed in admin - from the value that is output.  We then output the chosen class to the content.

```html
    <div class="panel <perch:content id="contextual" type="select" label="Panel context" options="Default|panel-default,Primary|panel-primary,Success|panel-success,Info|panel-info,Warning|panel-warning,Danger|panel-danger">">
      <div class="panel-heading">
        <h3 class="panel-title"><perch:content id="heading" type="text" label="Heading" required title></h3>
      </div>
      <div class="panel-body">
        <perch:content id="content" type="textarea" label="Content" required size="m" markdown editor="markitup">
      </div>
      <perch:if exists="footertext">
        <div class="panel-footer">
          <perch:content id="footertext" type="text" label="Footer text" help="An optional footer for the panel">
        </div>
      </perch:if>
    </div>
```

### Panel with List Group

You can output [full width list-groups](http://getbootstrap.com/components/#panels-list-group) or tables within a Panel. This template has a panel with a heading and body, then a Bootstrap [List Group](http://getbootstrap.com/components/#list-group) added by way of a [Perch Repeater](/templates/repeaters/) template tag.

```html
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><perch:content id="heading" type="text" label="Heading" required title></h3>
      </div>
      <div class="panel-body">
        <perch:content id="content" type="textarea" label="Content" required size="m" markdown editor="markitup">
      </div>
      <perch:repeater id="link_list" label="Resources list">
      <perch:before>
        <div class="list-group">
      </perch:before>
        <a class="list-group-item" href="<perch:content id="link" type="text" label="Link" required>">
          <h4 class="list-group-item-heading"><perch:content id="linkheading" type="text" label="Link heading" required></h4>
          <p class="list-group-item-text"><perch:content id="linkdesc" type="text" label="Link short description" required></p>
        </a>
      <perch:after>
        </div>
      </perch:after>
      </perch:repeater>
      <perch:if exists="footertext"><div class="panel-footer"><perch:content id="footertext" type="text" label="Footer text" help="An optional footer for the panel"></div></perch:if>
    </div>
```

As you can see it is easy to turn Bootstrap components into Perch Templates. You can use these examples as starting points for your own Bootstrap and Perch websites.
