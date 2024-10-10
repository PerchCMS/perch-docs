---
title: Twilio App
layout: section.html
nav_groups:
  - primary
---

The Twilio App enables the addition of a two factor member authentication to your site.

Two-factor authentication (2FA) with Twilio adds an extra layer of security to a member site by requiring users to verify their identity through something they know (like a password) and something they have (like a mobile phone).
## Use of the Twilio App for verify your members

1.User Login Attempt: When a user tries to log in to the member site, they enter their username and password as usual.

2.Twilio Sends Verification Code: After the user enters the correct credentials, the site triggers Twilio to send a one-time verification code via SMS to the user's registered phone number.

3.User Enters Code: The user receives the code on their device and enters it into the site.

4.Verification: The site checks the entered code against the one sent by Twilio. If the code matches and is within the valid time frame, the user is granted access.

5.Access Granted: Upon successful verification, the user is logged into their account on the member site.

