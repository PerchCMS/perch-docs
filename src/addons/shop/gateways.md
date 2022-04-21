---
title: Payment Gateways
layout: section.html
nav_groups:
  - primary
---

Instructions are available for the following gateways:

|Gateway|Supported|Seen working|Tax evidence collection|Recurring payments|
|--|--|--|--|--|
|[Braintree](/addons/shop/gateways/braintree/)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)||
|[Manual](/addons/shop/gateways/manual/)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)|N/A||
|[PayPal Express](/addons/shop/gateways/paypal-express/)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)||
|[Stripe](/addons/shop/gateways/stripe/)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)||
|[Stripe SCS](/addons/shop/gateways/stripe-sca/)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)||
|[Worldpay](/addons/shop/gateways/worldpay/)|![Yes](/assets/svg/check.svg)|![Yes](/assets/svg/check.svg)||||


Tax evidence collection happens for all transactions, but only some gateways enable us to retrieve the country the payment card is registered to.

Perch Shop uses the [Omnipay](http://omnipay.thephpleague.com) library for supporting payment gatways. That means that any gateway that has a driver for Omnipay has the potential to work just fine with Perch Shop. Omnipay has a long list of [official](http://omnipay.thephpleague.com/gateways/official/) and [third party](http://omnipay.thephpleague.com/gateways/third-party/) gateways that are supported. It's also possible for a PHP developer to add support for an unlisted gateway.

While this very comprehensive list of gateways should be possible to use with Perch Shop, we're not going to list a gateway here until we've worked on it and seen it working in action. That way, you can know that when a gateway is listed here it should be simple to start using without any developer knowledge.

If you have a gateway you need to get working with Perch Shop, we can help you do that. To do that, we need

1. For there to be an official or third-party Omnipay driver for the gateway
2. A test account so that we can try it and see it working

If you'd like help doing that, [send us an email](mailto:support@grabaperch.com) and we'll take a look and see what's going to be possible. It's best to start this process as early into a project as is possible.

If your requirement is urgent, or your gateway does not have an Omnipay driver we may be able to provide development expertise in order to prioritize implementation and testing of a gateway as a [sponsored feature](https://shop.perchcms.com/roadmap).
