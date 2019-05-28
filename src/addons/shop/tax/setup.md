---
title: Tax Setup
nav_groups:
  - primary
---

Much of the tax configuration is done via the Perch Control Panel in order that the store owner can update tax rates in future without needing to do anything in the code. The initial setup can take a little time but once set up it should just be a case of updating tax rates if they change.

## In Settings

Under Settings, and check the value of the "Prices are entered as" setting. Usually this will be Tax Exclusive, but change it if you need to. Save the settings if you made changes or not.

Also in Settings ensure the Reporting Currency is set as the currency you need to report for tax in. You should already have set up your currencies before doing this.

## Shop App > Tax

Select the Shop app from the Apps menu and go to Tax. Here we can set up tax groups and locations.

### Tax Locations

Go to Locations and add a new entry for the home location of your store. Check the box to make it the home location.

If you know that you need to charge tax at the rate of the buyer as opposed to the rate in the home location of the store you will also need to set up a Location here for each country you sell to. This situation is that which applies to anyone selling digital products within the EU and needing to submit VAT MOSS returns.

**IMPORTANT:** Make sure that after setting up tax locations you go and save the form under Tax Groups. This will ensure the group and location data is linked in the database.

### Tax Groups

Staying within Tax, go to Groups and add a new tax group for the type of things you need to charge different rates of tax for. Examples might be "Digital products", "Children's clothing" or "Shipping". Most sales tax regimes have different tax charged on different things. For example in the UK we have items that VAT applies to, items that have a reduced rate of VAT and items that do not have VAT added.

For each group you can set whether tax is charged at the Buyer's Rate or the Seller's (Shop location) rate. You can also set the level of tax that group has applied and do this on a location by location basis.

## A worked example

My home location is the United Kingdom and I am registered for VAT in the UK. My store sells e-books (a digital product), books (a zero-rated physical product) and t-shirts (a physical product). The e-books and t-shirts attract standard rate VAT in the UK, physical books however are zero-rated.

In Settings I chose to enter prices as tax exclusive and set my Reporting Currency as GBP.

Under locations I set up United Kingdom as my home location and configure two VAT rates - standard at 20% and zero-rated at 0.

I also want to sell to France and Germany. So I setup France and Germany as Locations and add their VAT rates. I get the rates from the [VAT Live website](http://www.vatlive.com/vat-rates/european-vat-rates/eu-vat-rates/) and I can see that France has a rate of 5.5% on Books, other products being charged at 20%. Germany has a rate of 7% on Books and 19% on other goods and services.

Note that e-books are typically classed as a Service in the world of EU VAT and so attract the standard and NOT the reduced VAT rate.

Under groups I add three groups:

- Digital Products
- Physical Products
- Books

Digital Products are my e-books. Due to the EU VAT rules these are taxed at the Buyer's Rate and I choose the Standard Rate of VAT for all three locations.

Physical Products are my t-shirts. These are taxed within the EU at the home location of the store. So I set these to Seller's Rate.

Books and treated differently. They are taxed at the Seller's Location so that means they are zero-rated in my case even if bought by someone in France or Germany.
