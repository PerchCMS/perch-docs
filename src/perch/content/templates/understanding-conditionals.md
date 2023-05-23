---
title: Understanding Conditional Tags
nav_groups:
  - primary
---

The Perch template language has lots of ways to control the output based on the content being used. This can range from simple tests to see if something exists, though to doing different things depending on the iteration within a loop.

The most straightforward example is if you want to output a default if no content is entered. For this you can use the else attribute.

```html
<perch:content id="img" type="image" else="default.png">
```

The above would use default.png as the image if no image had been added for that item.

If you want a bit more control, you can use a perch:if tag pair to test if something is set.

```html
<perch:if exists="img">
    <perch:content id="img" type="image" output="tag">
<perch:else>
    <img src="default.png">
</perch:if>
```

The perch:if tag checks if img exists, and does one thing if it does, and other if it doesn’t. You can also flip this on its head with `not-exists`:

```html
<perch:if not-exists="img">
    <img src="default.png">
<perch:else>
    <perch:content id="img" type="image" output="tag">
</perch:if>
```

If you need to check more than one item with exists, you can do that too:

```html
<perch:if exists="price AND (on_sale OR is_download)">
   ...
</perch:if>
```

As well as checking if an item exists, you can check its value. This would compare the field date to see if it’s greater than 1 Jan 2008:

```html
<perch:if id="date" match="gt" value="2008-01-01">
   ...
</perch:if>
```

If you want to compare against a dynamic value, use curly braces:

```html
<perch:if id="date" match="gt" value="{today}">
   ...
</perch:if>
```

There’s all sorts of interesting things we can do when it comes to looping through sets of results. We can compare if a value is different from the previous item in the loop:

```html
<perch:if different="date">
   <h2><perch:content id="date" type="date" format="d F Y"></h2>
</perch:if>
```

This would output a heading with the date if the date of the current item is different from the last. You can also use the format attribute to manipulate the value before it’s compared – for example, to only compare the year part of a date:

```html
<perch:if different="date" format="Y">
   <h2><perch:content id="date" type="date" format="Y"></h2>
</perch:if>
```

You can also conditionally do things on different iterations through the loop. You can use perch:every to do something different every 4th time, for example:

```html
<perch:every count="4">
    <hr>
</perch:every>
```

You can also use CSS nth-child logic in your tags:

```html
<perch:every nth-child="4n+1">
    This happens for 1, 5, 9, 13, 17, 21...
</perch:every>
```

You can learn more about perch:every in our video tutorial. A great place to dive into learning about conditionals is the documentation for `perch:if`.
