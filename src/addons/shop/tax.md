---
title: Tax
nav_groups:
  - primary
---

_N.B. Any examples included are for illustrative purposes and do not constitute tax advice._

Perch Shop implements a comprehensive location based tax system. We give you the tools to comply with a variety of VAT and sales tax situations. None of what we provide should be considered tax advice or "out of the box" compliance as what you need to do varies with the types of products sold and the location your company is based. In this section of the documentation we will explain some typical scenarios and how to deal with them in Perch Shop as a basis for your implementation.

If you find that Perch Shop does not enable compliance with a particular tax requirement let us know. We want to make sure you have the tools you need to be confident in the solutions you build.

You can find the options for configuring tax in the Shop app under Tax.

## List of tax-related features

A short list of things that enable tax compliance in Perch Shop.

- **Location based tax system**: charge VAT based on the location of your Buyer, rather than the location of the Store.
- **Tax "evidence collection"**: we store location evidence for customers. Schemes such as the EU VAT MOSS require you can prove you charged the correct amount of VAT based on Buyer Location.
- **Sequential invoice numbering**: invoice numbers not linked to database ID.
- **Multiple tax rates and locations in one order**: Sell and digital download AND a physical product. Different rates may apply and one product may be charged at the home location or the store and another at the Buyer location. We can do that.
- **Show tax amount in reporting currency** - even if you take payment in another currency.
- **Enter prices tax inclusive or tax exclusive** - depending on how you wish to show and charge taxes.

## Tax Locations

Some tax systems require you to charge customers different rates of tax based on their location in the world. To deal with this we have **tax locations**.

A tax location has a **title** and consists of a country and a number of **tax rates**. These rates should reflect the different rates of tax that are payable in that location. For example, in the UK we charge customers _value added tax_ (VAT) at a standard rate of 20%. For some types of goods such as children's car seats there is a reduced rate of 5%. Other items such as books are taxed at 0%.

To mimic this in my tax location, I'd set the **country** to United Kingdom and set up rates as follows:

|Title|Rate %|
|--|--|
|Standard|20|
|Reduced|5|
|Exempt|0|


If the tax location represents the location the shop trades from, check the **home location** box. If the tax location should be used when no more specific matches are found (e.g. a "rest of world" location), check the **default location** box.

A minimal configuration would be to create one tax location and set it as both home and default locations.


## Tax Groups

Different types of products and services are taxed in different ways. For example, in the EU we have to charge tax on digital products and services according to a different set of rules than physical products and services. A music album sold as an MP3 would have different tax rules applied to it than the same album sold as a CD.

To make these different types of rules easy to work with, we have Tax Groups. You'd create a group to group together all the things that are taxed in the same way. When adding a product, you pick which group it belongs to and it gets that set of rules applied. When selling music, you might create a group called "Physical goods" and one called "Digital goods". The CD would go in the former and the MP3 in the latter.

Each tax group has a **title** to identify it, and you choose whether **tax is charged at** the buyer's rate (based on the customer's location) or the seller's rate (based on your store location). To use our music example, the physical CD might be charged at the seller's rate, but the MP3 could be charged at the buyer's rate.

In the **location tax rates** section you can set which rate of tax applies to the group for each of your tax locations. For example, an item such as an ebook might be charged at the standard rate in one country, but at a reduced rate in another. You can set that here.
