---
title: Installation
nav_groups:
  - primary
---

Download the latest version of the Twillio App .
Unzip the download where you will find two folders.

-   `twillio` – which contains example pages
-   `perch_twillio` – which is the actual app

Copy the `perch_twillio` folder into `perch/addons/apps/`

Add `perch_twillio` [to your apps.php file](/docs/installing-perch/installing-apps/).

## Getting your Twilio  credentials

When you next log into the Perch admin the Twillio install script will run behind the scenes to create the necessary tables. A new Twillio navigation item will appear in the administration menu.
###  Sign Up for Twilio
1. **Create an account** on Twilio's website.
2. **Verify your phone number**.
3. **Get your Account SID and Auth Token** from the Twilio Console.

In your `perch/config/config.php` file, add your Auth Token settings for Twilio .

`define('PERCH_TWILLIO_AUTHTOKEN', "b9b26a...");`

In the Setting page of your admin panel add in the Twilio section the From Number and the SID.

### Notes:
**Twilio Sandbox**: Initially, you might need to use the Twilio Sandbox  to test sending messages.
