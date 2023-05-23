---
title: Requirements
nav_groups:
  - primary
---

The Shop app has its own set of technical requirements in addition to those of Perch itself.

* Perch Runway (recommended) or Perch 2.8.29 or above
* PHP 5.4 or above, PHP 7 recommended
* PHP cURL extension for communicating with gateways
* PHP database connection with PDO

The Shop app is ideally suited to use with Perch Runway, and that's what we'd recommend for any store with more than a handful or products. Runway includes automated off-site backup functionality which is strongly recommended - you wouldn't want a server failure to result in the loss of trading history and customer data. For added a few light sales to a smaller site, the app will also work with Perch.

Although PHP 5.4 is the technical lower limit for compatibility, this version of PHP has been end-of-lifed and no longer receives security updates. This is obviously a concern when building an ecommerce site. **We strongly recommend you use an actively maintained version of PHP, such as 5.5 or above.** Switching to PHP 7 would offer your site large performance improvements.
