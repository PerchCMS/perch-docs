---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the Shop App checking that the minimum
version of Perch is the same or less than the version of Perch that you
are running.

Unzip the download where you will find three folders.

-   `shop` – which contains example pages
-   `addons/apps/perch_shop_paypal` – which is the actual app
-   `addons/feathers/paypalshop` – which contains a Perch Feather to
    include the PayPal JavaScript includes and also our example CSS

Copy the `perch_shop_paypal` folder into `perch/addons/apps/`

Add `perch_shop_paypal` [to your apps.php
file](/docs/installing-perch/installing-apps/).

Next time you log into the Perch Admin you will see an additional menu
option of Shop in the admin navigation. Visit this link and Perch will
create the tables that the Shop App needs behind the scenes.

## PayPal Configuration

Once your site is on a server that can be accessed via the Internet you
will need to set up the IPN script so that PayPal can post order details
to it. To do this log into your PayPal account.

Under Profile \> Selling Preferences find the link to update **Instant
Payment Notifications**

Enable the IPN and then add a link to the callback script on your
server. If you have not renamed the Perch folder and it is in the root
of your site this will be:

`http://yourdomain.com/perch/addons/apps/perch_shop_paypal/callback/ipn_callback.php`

## Perch Configuration

After installing the Shop app some new Settings will appear on your
Settings page in admin. You need to add your PayPal email address here,
and also check that the path to your product pages is correct then save
the form.

Copy the `paypalshop` folder from inside feathers to
`perch/addons/feathers`

Open `perch/config/feathers.php` and add the following include line
inside `<?php` tags.

{% highlight php startinline %}
include(PERCH_PATH.'/addons/feathers/paypalshop/runtime.php');
{% endhighlight %}

If you wish to use our example CSS as a starting point you will also
need to download and install the [Perch Quill
Feather](https://grabaperch.com/add-ons/feathers/quill).

If quantities are not being updated after an order and/or orders are not
appearing under the orders tab then this means your IPN script is
failing.

Make sure you have configured this at PayPal and the URL pasted into
PayPal is correct.

We create a log of IPN callbacks in a table (perch2_shop_log) in your
database. Viewing this directly should show what has been returned. If
you contact Perch support with IPN issues then we need to know what is
being posted into this table after an order.
