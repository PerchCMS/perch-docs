---
title: Blocks Tags
nav_groups:
  - primary
---

Blocks offer the ability to structure an item with a choice of mixed content. Within each item (such as an item in a multiple item region, or a Collection item in Perch Runway) the template can define a `perch:blocks` section containing a choice of blocks to add.

Blocks defines the following template tags:

| Tag | Description |
|-|-|
| `<perch:blocks></perch:blocks>` | The entire blocked section should be inside this pair. |
| `<perch:block></perch:block>` | An individual block, defining the start and end of that micro-template |

Each block is like a micro-template. It can include the usual mix of field types, Repeaters and markup.

```html
<perch:blocks>
  <perch:block type="text" label="Text">
    ...
  </perch:block>
  <perch:block type="quote" label="Pull quote">
    ...
  </perch:block>
  <perch:block type="image" label="Feature image">
    ...
  </perch:block>
</perch:blocks>
```

## The `perch:blocks` tag pair

All blocks must exist within a  `perch:blocks` tag pair. This defines the _’blocked’_ section of the template.

A template using blocks can contain other content outside of the blocks. The order of the fields and the blocked section can be controlled with the `order` attribute.

```html
<perch:content type="smarttext" id="heading" order="1">
<perch:content type="date" id="date" order="3">
<perch:blocks order="2">
  …
</perch:blocks>
```

The blocked section can use `perch:before` and `perch:after` sections in order to display markup around the blocks. These do not show if no blocks are selected.

The blocks are output in a group, so `perch:every` acts across the blocks, and each block has its own `perch_item_index` and friends.

## The `perch:block` tag pair

Block tags appear within a `perch:blocks` tag pair. They define each block than can be chosen by the content editor.

```html
<perch:block type="image" label="Feature image">
  <figure>
      <img src="<perch:content id="image" type="image" width="1600" label="Image">">
      <figcaption>
        <perch:content id="caption" type="smarttext" label="Caption">
      </figcaption>
    </figure>
</perch:block>
```

A `perch:block` tag pair then just contains normal template code, including content tags, repeaters and markup. (Each individual block does not have a `before` or `after` section, but they do have an index within the blocked group.) You can use the `divider-before` and `divider-after` attributes to give the edit form more structure.

The `perch:block` opening tag has two required attributes. `type` describes the block to the templating system, and `label` describes it to your users.

|Attribute|Value|
|-|-|
|type|An ID-like reference used to refer to the block in templates|
|label|A short, human-readable description of the block type|
|icon|The name of an icon to use to represent the block in the user interface|

The `label` attribute is used in the editing interface to describe the block.

A blocked section can include as many blocks as needed. A template can only contain one `perch:blocks` section.

## Using template includes

It is perfectly fine to use template includes to make your code more modular.

```html
<perch:blocks>
  <perch:block type="image" label="Feature image">
    <perch:template path="content/blocks/image.html">
  </perch:block>
</perch:blocks>
```

You can even make sets of common blocks and add special cases as needed:

```html
<perch:blocks>
  <perch:template path="blocks/article_blocks.html">
  <perch:block type="image" label="Feature image">
    <perch:template path="content/blocks/image.html">
  </perch:block>
</perch:blocks>
```
## Accessing content outside the blocks

By default, blocks operate as a silo – like a region within the template. They have their own content scope, and the template engine treats them as a distinct zone with its own *before* and *after* properties and new item counts.

Content from outside the `perch:blocks` tag is out of scope. You can bring it into scope for all blocks using the `scope-parent` attribute on the `perch:blocks` tag.

To prevent ID clashes, the items from outside the blocks become `parent.originalID` within the blocks. So a field that is `id="title"`
outside the blocks would be `id="parent.title"` when brought into scope within the blocks.

## Icons

A block can be represented by an icon. The available icons are listed below.



|Icon|Name|
|--|--|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#address-book"> </svg> |address-book|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#alarm-alt"> </svg> |alarm-alt|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#anchor"> </svg> |anchor|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#bed"> </svg> |bed|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#bell"> </svg> |bell|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#book"> </svg> |book|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#bookmark"> </svg> |bookmark|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#burger"> </svg> |burger|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#calculator"> </svg> |calculator|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#calendar-add"> </svg> |calendar-add|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#calendar"> </svg> |calendar|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#camera-alt"> </svg> |camera-alt|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#cart"> </svg> |cart|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#chart-pie"> </svg> |chart-pie|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#chat"> </svg> |chat|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#circle-add"> </svg> |circle-add|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#clock"> </svg> |clock|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#cloud"> </svg> |cloud|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#code"> </svg> |code|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#coffee-togo"> </svg> |coffee-togo|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#compass"> </svg> |compass|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#contacts"> </svg> |contacts|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#dashboard"> </svg> |dashboard|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#database"> </svg> |database|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#document"> </svg> |document|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#download"> </svg> |download|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#edit"> </svg> |edit|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#flag"> </svg> |flag|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#folder"> </svg> |folder|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#heart"> </svg> |heart|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#home"> </svg> |home|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#keyboard"> </svg> |keyboard|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#keynote"> </svg> |keynote|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#lightbulb"> </svg> |lightbulb|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#link"> </svg> |link|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#list"> </svg> |list|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#location"> </svg> |location|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#mail"> </svg> |mail|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#megaphone"> </svg> |megaphone|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#menu"> </svg> |menu|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#microphone"> </svg> |microphone|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#music"> </svg> |music|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#newspaper"> </svg> |newspaper|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#notepad"> </svg> |notepad|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#paint-roller"> </svg> |paint-roller|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#paintbrush"> </svg> |paintbrush|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#paper-airplane"> </svg> |paper-airplane|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#paperclip"> </svg> |paperclip|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#pencil-paintbrush-pen"> </svg> |pencil-paintbrush-pen|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#pencil"> </svg> |pencil|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#phone"> </svg> |phone|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#photo"> </svg> |photo|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#photos"> </svg> |photos|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#plane"> </svg> |plane|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#popsicle"> </svg> |popsicle|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#pulse-wave"> </svg> |pulse-wave|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#puzzle"> </svg> |puzzle|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#question"> </svg> |question|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#quote"> </svg> |quote|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#redirect"> </svg> |redirect|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#signs"> </svg> |signs|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#tag"> </svg> |tag|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#theater-masks"> </svg> |theater-masks|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#truck"> </svg> |truck|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#tv"> </svg> |tv|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#umbrella"> </svg> |umbrella|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#user-female"> </svg> |user-female|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#user"> </svg> |user|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#users"> </svg> |users|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#utensils"> </svg> |utensils|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#video"> </svg> |video|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#weather"> </svg> |weather|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#wine"> </svg> |wine|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#world"> </svg> |world|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#wrench"> </svg> |wrench|
|<svg role="img" width="16" height="16"> <use xlink:href="/assets/svg/blocks.svg#yin-yang"> </svg> |yin-yang|