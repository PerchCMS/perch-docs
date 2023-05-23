---
title: Shipping
nav_groups:
  - primary
---

When a customer orders a physical product from your store, you need a way to deliver that product to them. Usually there's a cost involved in doing so depending on the method used to send the order and the location you're sending it to.

This is what shipping methods and zones are for. You can configure them within the Shop app, under

## Shipping zones

Shipping zones enable you to charge customers different amounts for delivering their order to different locations around the globe. By default, you must have at least one shipping zone if you intend to ship physical goods.

Shipping zones have a **title** and **slug** and a **description** for displaying on your site. When the **status** is set to active, the zone will be available for use.

You should always configure one **default zone**. This is the zone that's used when none of your other zones prove to be a more specific match for the customer's shipping location. The most basic configuration would have one zone, set to be the default. The default zone doesn't need to pick any countries from the list.

To create a more specific zone (e.g. *Mainland Europe*) select the countries from the list (France, Germany, Spain and so on).

To find a matching shipping zone for an order, Shop will look for a zone with the matching country, and if none is found will then use the default zone.

## Shipping methods

The service your store offers to ship an order to a customer is known as a _shipping method_. Examples might include "Free standard delivery", "Next day" and so on.

Shipping methods can optionally apply to each of the shipping zones. For example, you might offer free standard postal delivery to local customers, but need to charge for a commercial parcel courier to deliver to a different country.

Not all shipping methods are available for all orders. The contents of the cart and the location of the customer are examined to find which shipping methods will be available for any given order. This is based on the customer's shipping zone, along with value, weight and dimesion triggers set up on the method itself.

A shipping method has a **title**, **slug** and **description**.

The **provider** is an optional field to describe which company is fulfilling that service. For example, for a "Next day" shipping method, the provider might be "UPS".

### Prices

In the **Price to customer** section, you can specify the price the customer is charged for the shipping method according to the shipping zone. Each shipping zone is listed, along with an **available** checkbox to activate and deactivate the shipping method for the specified zone.

The **tax group** setting enables you to pick which tax group applies to shipping charges. You may want to create a tax group called "Shipping" to keep this distinct from your products, depending on the complexity of your local tax laws.

### Value triggers

In the **Order value** section, you can set trigger values for the shipping method.

The **max order value** is the upper limit on the order value for this shipping method to apply. For example, if this limit was set at $100 and the order total came to $101, this shipping method would not be one of the available options.

Similarly, the **min order value** sets the lower limit. If this was set to $50, this shipping method would not be available for an order valued at $49, but would be for an order valued at one dollar more.

These value triggers are useful for setting up different shipping prices based on the value goods ordered.

### Weight triggers

Under **applicable weights** the minimum and maximum weights can be set. Product weights are summed to determin if the weight limit applies.

If your provider charges differently based on item weight, you can use the **min weight** and **max weight** options to make different shipping methods available for different weights of order. Or you may be able to offer free shipping up to a certain weight, but then need to charge for a more expensive method after that point.

The units used for weights are up to you. You should be sure to use consistant units across your products and shipping methods. Values are summed without respect to the type of units they might represent.

### Size triggers

In the **applicable dimensions** section, you can set the **max width**, **height** and **depth** for a product. Again, the units are up to you.

No attempt is made to try and combine mutliple products into boxes of a given size - the dimensions are simply a maximum and are triggered by the largest product in any dimesion within the order. If an order contains an item that is 2000mm wide and the max width is set as 1500mm, the shipping method will no be available to choose.
