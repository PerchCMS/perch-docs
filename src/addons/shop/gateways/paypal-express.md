---
title: PayPal Express
nav_groups:
  - primary
---

*Gateway slug:* `paypal-express`

These are instructions for PayPal Express payments.

## Settings

In your `perch/config/shop.php` file, add your settings for PayPal Express.

```php
<?php
  return [
    'gateways' => [
      'paypal-express' => [
        'enabled'   => true,
        'test_mode' => true,
        'live' => [
          'username'  => 'paypal_api_username',
          'password'  => 'paypal_api_password',
          'signature' => 'paypal_api_signature',
        ],
        'test' => [
          'username'  => 'paypal_api_username',
          'password'  => 'paypal_api_password',
          'signature' => 'paypal_api_signature',
        ],
      ],
    ],
  ];
?>
```

**Note:** these are _not_ your regular PayPal account details - see below.

## Getting your PayPal test credentials

To start testing with PayPal, you need to create an account in the PayPal Sandbox, and then get API credentials for that account. These go into your Shop config file.

1. Go to [https://developer.paypal.com/](https://developer.paypal.com/)
2. Log in using your regular PayPal account
3. Go to Dashboard
4. Under Sandbox to go Accounts
5. Either create a new Merchant (seller) Business account, or select one from the list
6. To to Profile and then API Credentials
7. Your Username, Password and Signature are displayed

Copy that username, password and signature into the `test` section of the Shop config file.

When you’re [ready to go live](https://developer.paypal.com/docs/classic/lifecycle/goingLive/), your client can log into the PayPal account money is to be paid into and obtain a set of [live credentials](https://www.paypal.com/us/cgi-bin/webscr?cmd=_profile-api-signature) directly from PayPal.

## Payment flow

The process for PayPal Express goes like this:

1. You call `perch_shop_checkout()` and the user gets sent to PayPal to make the payment
2. The user gets sent back to a page on your site with a `token` in the URL
3. You need to then call `perch_shop_complete_payment()` to take that token and complete the payment (the user says on your page)

### Step 1: Initiating checkout

```php
<?php
if (perch_member_logged_in()) {

  // your 'success' return URL
  $return_url = 'http://mysite.com/payment';
  $cancel_url = 'http://mysite.com/';

  perch_shop_checkout('paypal-express', [
    'return_url' => $return_url,
    'cancel_url' => $cancel_url,
  ]);
}
?>
```


### Step 2: The user goes off to PayPal

The user will be sent to PayPal. If they cancel, they'll be sent to the `cancel_url` URL - you don't really need to do anything.

If the payment is authorised at PayPal, the user will be returned to the `return_url` - your 'payment' page.

### Step 3: Confirm payment

The user gets sent back to your `return_url` page with a token in the URL. Perch Shop will pick up the token automatically - all you need to do is call `perch_shop_complete_payment()` and let it know that you're using `paypal-express` as the gateway.

```php
<?php
  perch_shop_complete_payment('paypal-express');

  if (perch_shop_order_successful()) {
      echo '<h1>Thank you for your order!</h1>';
    }else{
      echo '<h1>Sorry!</h1>';
    }
?>
```

## Troubleshooting

### Failed payments

While getting your shop set up, it's likely you might see some issues processing payments until everything is configured just right. Shop outputs any payment gateway errors into its debug console. Turning on debug mode will enable you to see this output.

One issue you may need to combat is the payment process redirecting the browser before you can see the debug console. To solve that, we have instruct Perch to hold any redirects.

1. [Enabled debug](/docs/installing-perch/configuration/debug/) for your page.
2. Before your call to `perch_shop_checkout()` add: `PerchUtil::hold_redirects();`

You should then be able to see any error messages. They may be verbose! Often the part of the message that is most useful is in red near the end.

### 'Transaction cannot complete'

It's important that the seller's PayPal account is configured for each currency you wish to sell in. This applies to sandbox (testing) accounts as much as live accounts. If your account is set to accept GBP and you put a transaction through in USD, it will fail with a message that looks like an insufficient funds error:

> 10417: Transaction cannot complete. Instruct the customer to retry the transaction using an alternative payment method from the customers PayPal wallet. The transaction did not complete with the customers selected payment method.

Don't be fooled; this problem is nothing to do with the _buyer_ and everything to do with the _seller's_ account configuration. To fix this, log into the seller account (either live, or via sandbox.paypal.com if testing) and add the currency you're selling in:

1. Go to My Account
2. In the Profile menu, select My Account Settings
3. Under Financial Information, select Currency Balances
4. Find the currency in the select list, and click Add Currency

You should then be able to sell in that currency.
