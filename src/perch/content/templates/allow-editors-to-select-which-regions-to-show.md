---
title: Toggling display with a checkbox
nav_groups:
  - primary
---

**How do I let my editor select which items to display in a multiple-item region?**

You want your editors to be able to create a list of content and use a checkbox to display certain ones on the site.

The first step is to add a checkbox to your template. This will enable your editor to make their selection.

```html
<perch:content id="showprofile" type="checkbox" label="Display on site" value="1" suppress>
```

The `suppress` attribute ensures that this does not output a `1` to your site when checked.

We can now test to see if the value of show profile is 1 using `perch:if`.

```html
    <perch:if id="showprofile" value="1">
      <h3>
		    <perch:content id="firstname" type="text" label="First name" required title order="1">
		    <perch:content id="lastname" type="text" label="Last name" required title order="2">
	    </h3>
	    <p class="job-title">
		    <perch:content id="jobtitle" type="text" label="Job title" order="3">
	    </p>
		  <perch:content id="showprofile" type="checkbox" label="Display on site" value="1" suppress>
    </perch:if>
```
