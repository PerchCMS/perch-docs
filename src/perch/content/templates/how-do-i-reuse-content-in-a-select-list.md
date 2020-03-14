---
title: Re-using content with a dataselect
nav_groups:
  - primary
---

**How can I use content from one part of my site in a select list to create content on another page?**

Your editors have created a list on one page of the site - for example a list of offices - you now want to let them select an office name from that list.

You can do this easily in Perch with our [dataselect](/templates/field-types/dataselect/) Field Type. It creates a select box which draws its options from the content of another region.

I have a Region on my /careers/index.php page that lists the offices. The template used for this Region looks like this.

```html
    <perch:content id="title" type="text" label="Office name" required title>
    <perch:content id="slug" for="title" type="slug">
```

On my job listing page I want the editor to just be able to select one of the office names already entered on this page. I enable this with the following Perch template tag.

```html
    <perch:content id="office" label="Office" type="dataselect" page="/careers/index.php" region="Offices" options="title">
```

* The `page` attribute is the page that the original content is on
* The type is `dataselect`
* The `region` attribute is the Perch Region on the page
* The `options` attribute is used to pass in the field or fields I want to use in my dataselect. You can use multiple fields, separated by spaces.
* The `allowempty` boolean attribute is used to make the selection optional. 
