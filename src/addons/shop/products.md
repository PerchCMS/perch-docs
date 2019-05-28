---
title: Products
nav_groups:
  - primary
---

These pages document the page functions and template tags specific to working with Perch Shop **Products** and **Brands**. On this page we have an overview of some of the functionality that is associated with Products and Brands to point you in the right direction when implementing your site.

## Adding products

Products are managed in the Perch Control Panel from the Products App. Each product has an SKU (a unique stock code - literally a _Stock Keeping Unit_), title, brand, one or more categories, a price, tax group, optional shipping dimensions.

## Managing Product Data

As with everything in Perch you are in control of how the product is displayed on your site and can add additional fields and information to each product. This happens by adding fields to the **Product Master Template**. You can then create multiple additional templates to show part of that data in listings and in other places around your site.

The Master Template contains basic HTML markup as well as all of the required fields for creating a Product. This gives you a quick way of displaying a product on your site. Remember that you don't need to use any of the mark-up and can hide from displaying any fields you do not need to show.

Find out more in the [Product Template docs](/templates/apps/shop/).

### Product Options, Variants and Variant SKU Codes

A product can have *options*. For a product like a t-shirt, these are things like size or colour. A product plus a option results in a *variant* of your product - a *large, blue* t-shirt.

Each variation gets its own SKU, based on the product's SKU. Our t-shirt with the code `TSH101` might have small, medium and large variants in blue: `TSH101_S_BL`, `TSH101_M_BL`, `TSH101_L_BL` and in red: `TSH101_S_RE`, `TSH101_M_RE`, `TSH101_L_RE`.

It's worth taking a moment to consider the format of your SKU codes, as you'll ideally stick with them for the lifetime of your store.

### Product Files

Products can be completely digital - for example an e-book - or a combination of physical and digital. An example of such a combination product would be a physical book that also has a PDF version, or a product that has an instruction manual available as a download.

After creating a product you have the option to upload any files that are the product or part of the product.

When a customer has bought a product that has one or more files attached, you can get a list of those files with [perch_shop_purchased_files()](/addons/shop/products/functions/perch-shop-purchased-files/). Normally the files will be access-restricted, so you can't just link to them to download. To download a restricted file, use [perch_shop_download_file()](/addons/shop/products/functions/perch-shop-download-file/).

### Product Tags

Perch Shop is tightly integrated with the Perch Members App. A Customer of your Shop is a Member in that system. Perch Members uses Tags in order that you can Tag members then check to see if a member has a certain tag before giving them access to content.

You can take advantage of this by adding a tag to your customer on successful purchase. This may just be so you can identify which customers own which products - however you can also use this to sell content "behind a paywall". You can create a Product that is access to part of your site, restrict that part of the Site by tag and then apply that tag to anyone who buys the Product.

## Displaying products

Once you have some products added, you can display them on your page.

Use [perch_shop_products()](/addons/shop/products/functions/perch-shop-products/) to display a list of products. This enables you to filter products by category, brand and so on. It's the main tool for displaying multiple products at once.

When it comes to showing the details of a single product, use [perch_shop_product()](/addons/shop/products/functions/perch-shop-product/). This takes the _slug_ of the product as an argument - this will usually be part of the URL from your listing page.
