---
title: Region Options
nav_groups:
  - primary
---


After adding a Perch Region to a page, and selecting a template in the Control Panel, there are other ways to configure your Region. You do this from inside the Region by clicking Region Options.

The default settings for a Region, unless you selected “Allow Multiples”
when selecting the template are as in the screenshot above. We assume just one item can be added to the Region and that it is not shared.

We also assume you want it in the search results and that everyone can edit it.

We will cover
[Sharing](/docs/control-panel/region-options/shared-content) and
[Multiple Item Regions](/docs/control-panel/region-options/multiple-item-regions) on their own Pages. The other settings are explained below.


## Join title fields with

If you use the [title attribute](/docs/templates/attributes/title) on a perch content tag in your template, this title will be displayed in admin as the title for the region. This is especially useful when editing a multiple item region in List Detail mode.

If you give multiple items in one template a title we will display all of them, and you can set here a character, such as a space or hyphen to separate them.

## Search

You can exclude regions from appearing in search by unchecking this box.

If the Region is shared or used in various places with perch_content_custom() you can set a URL here for search to use when linking to this content.

## Permissions

You can give permission to any of your Roles here to edit this content.
