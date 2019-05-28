---
title: Installation
deprecated: true
nav_groups:
  - primary
---

Download the latest version of the Shop App checking that the minimum version of Perch is the same or less than the version of Perch that you are running.

Unzip the download where you will find three folders.

`shop` – which contains example pages\
 `perch_shop_foxycart` – which is the actual app\
 `feathers` – which contains a Perch Feather to include the FoxyCart JavaScript includes and also our example CSS

Copy the `perch_shop_foxycart` folder into `perch/addons/apps/`

Add `perch_shop_foxycart` [to your apps.php file](/docs/installing-perch/installing-apps/).

Save this file. Next time you log into the Perch Admin you will see an additional menu option of Shop in the admin navigation. Visit this link and Perch will create the tables that the Shop App needs behind the scenes.

## FoxyCart Configuration

In your FoxyCart account on the **FoxyCart website** you need to adjust
some settings.

Under Store > Advanced:

1.  To use the xml datafeed to update your stock, check “Would you like
    to enable your store datafeed?” then add the URL of the callback
    script. This script is found in
    `/perch/addons/apps/perch_shop_foxycart/callback/foxy_cart_callback.php`
    so if your domain is `http://example.com` the script is at
    `http://example.com/perch/addons/apps/perch_shop_foxycart/callback/foxy_cart_callback.php`.
    If you have renamed the Perch folder then rename it here too.
2.  If you want to use the security option to prevent tampering with
    your cart variables check “Would you like to enable cart
    validation?”
3.  The API Key listed below these fields is a required setting for
    Perch if you are using either the callback script or the validation,
    so after saving this page copy it.

**Note:** When enabling the cart validation security option, FoxyCart
generates a new API key. If you change this option you also need to copy
across the new API key, otherwise you’ll get validation errors on adding
something to your cart.

## Perch Configuration

Once your shop is installed visit the Settings page in Perch and you
should see some new settings.

1.  “Use FoxyCart Security” is if you wish to use the validation. We
    would recommend this.
2.  Add the API key that you copied.
3.  Add the URL of your cart on FoxyCart, unless you are using a custom
    domain this will be https://yourstore.foxycart.com/cart. Note the
    https.

Copy the `foxyshop` folder from inside `feathers` to
`perch/addons/feathers`

Open `perch/config/feathers.php` and add the following include line
inside `<?php` tags.

{% highlight php %}
include(PERCH_PATH.'/addons/feathers/foxyshop/runtime.php');
{% endhighlight %}

If you wish to use our example CSS as a starting point you will also
need to download and install the [Perch Quill
Feather](https://grabaperch.com/add-ons/feathers/quill).
