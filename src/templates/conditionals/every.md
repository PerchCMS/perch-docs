---
title: every
nav_groups:
  - primary
---

The `<perch:every></perch:every>` tags are used within a template which outputs multiple items. They can be used if you need to output something different every other item, or every 3 items and so on.

```html
<perch:every count="3">
    This happens every 3 items.
</perch:every>

<perch:every nth-child="odd">
    Odd items only
</perch:every>

<perch:every nth-child="2n+3">
    You can use nth-child values in the same way as in CSS selectors
</perch:every>
```

### Attributes for every

|Attribute|Value|
|-|-|
|count|A simple integer. A value of 3 would match for every third item.|
|nth-child|An alternative to count. Takes CSS-style nth-child values including keywords|


## Else blocks

Every also supports an else block. It is used if the ‘every’ condition is false.

```html
<perch:every nth-child="odd">
    Odd items
<perch:else>
    Even items
</perch:every>
```
