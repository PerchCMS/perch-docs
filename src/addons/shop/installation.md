---
title: Installation
nav_groups:
  - primary
---

The Shop app requires a little more configuration and set-up than some of our simpler add-ons. There are three apps - Shop, Products and Orders, and uses Members to handle user accounts. All four apps are included in your download.

## Installation and Initial Setup

Follow these steps to get started with your store. The order is important, so please take a moment to follow the steps with extra care.

### Installation

**Make sure Perch or Perch Runway is up to date**. Shop is a very new App and likely to receive rapid updates which will also rely on an updated Perch Core.

#### Step 1. Add the Shop Files {#files}

Unzip the add-on and copy items in `addons/apps` to your `perch/addons/apps` folder. If you already have Members installed, the version you have downloaded is the latest and you should update to this if running an older version.

#### Step 2. Edit your `apps.php` config file {#appsconfig}

Edit your `perch/config/apps.php` file to include an entry for `perch_members` and `perch_shop`. The entry for `perch_members` should be *before* the entry for `perch_shop`. For example:

```php
<?php
    $apps_list = array(
        'content',
        'categories',
        'perch_blog',
        'perch_members',
        'perch_shop',
    );
?>
```

The rest of the installation and setup happens inside the Perch Control Panel. Log in there to continue. Perch will create the required database tables as you move through setup.

### Initial Configuration

Before you can add your first product, you need to perform some configuration such as setting up supporting items like tax locations, shipping options, categories and brands.

In some stores not all of these will be necessary for what you're selling, so feel free to create entries with names like "Default", "Global" or "Free" etc, so that you can set them and move on. Remember you don't need to display things on the page that you don't need, so these don't matter too much - they just need to be in place.

#### Step 3. Create Categories {#categories}

Select **Categories** from the Apps menu, and create a new empty Set to act as the primary category set for organizing your store. A good name might be `Products`. Create some categories as needed for your products. If products are not going to be displayed in Categories you could just use a single category of `default`.

#### Step 4. Currency Setup {#currency}

Select the **Shop** app from the Apps menu and go to **Currencies**. Enable and disable the currencies you wish to sell in by clicking on the currency name and selecting or deselecting the checkbox.

**Which currencies can I use?**

Your payment provider needs to support the currency you wish to sell in. Providers such as Stripe and PayPal offer a wide range of currencies. Traditional merchant accounts may limit you to your home currency.

Assuming your payment provider supports multiple currencies, if you are using **Perch Runway** with Shop then you can sell in multiple currencies which would mean your customer can choose the currency to pay in. Standard Perch is limited to a single currency. If you are using Perch and enable a currency, all others will be disabled.

#### Step 5. Pricing and Tax {#tax}

Perch Shop includes a complete Location Based Tax system. You can [find out more about how tax works here](/addons/shop/tax/), however the choices you make around tax should be checked with the store owner.

Go to the general **Perch Settings** page. You will see that a section has appeared here for Shop. Check the value of the "Prices are entered as" setting. Usually this will be Tax Exclusive, but change it if you need to. Set the Default and Reporting currencies. *Save the settings if you made changes or not*.

Select the **Shop** app from the Apps menu and go to **Tax**. Go to **Locations** and add a new entry for the _home location_ of your store. Check the box to make it the home location.

Staying within **Tax**, go to **Groups** and add a new tax group for the type of things you need to charge different rates of tax for. Examples might be "Digital products", "Children's clothing" or "Shipping". If everything has the same rate of tax you could create a single group named **Standard** or similar.

If all items are taxed according to the home location of the store, and all customers no matter their location pay this tax, this is all you need to do. See the [tax documentation](/addons/shop/tax/) if you have more complex requirements.

#### Step 6. Shipping  {#shipping}

You need a Shipping Zone and Method even if you are selling digital items that don't need to be "shipped".

Staying within the **Shop** App, go to **Shipping** then **Zones** and add at least one shipping zone. This is where you would create zones such as "UK", "Europe" and "Rest of World" for example, in order that you can add the different prices for Shipping. You can then select the countries that are part of the zone. Make sure that one zone is set as the catch-all (usually your "Rest of World").

If you are only selling Digital Products or everything will be shipped at a flat rate no matter where it goes to, create a single Zone called "Global" or similar. Then check the checkbox to mark this as a catch-all.

Staying in **Shipping** go to **Methods** and create at least one Shipping Method. Shipping Methods can be very specific. You can specify different methods based on location, weight, size or order value. You can always update this later, you need at least one method to be able to test Shop functionality however.

If you are selling Digital Products then you can create a Method named `digital` that has no price attached, select the Global location you created in the last step and you are good to go.

For more details on Shipping Zones and Methods and how to use them in Perch Shop, see the [Shipping documentation](/addons/shop/shipping/).

#### Step 7. Brands and Products {#brands}

Select the **Products** App from the App Menu and go to **Brands**, add at least one brand. This can be `default` or similar, it becomes useful for stores selling a range of items from different brands.

You're now ready to [add a product](/addons/shop/products/)! Phew.

Remember, everything we have set up here can be changed later. Much of it you will want to show the Shop Owner how to update and change, so they can add new Shipping Options and update tax rates and so on. These steps will get you into good shape to begin building your Shop.
