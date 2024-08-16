---
title: Member Completes Phone
nav_groups:
  - primary
---


Members need to be logged in.
If not, display the login form or a registration form if they are a new member.
When a member is logged in, check if their phone has been registered. 
If not, display the Twilio form to complete or verify the member's phone. 
When the member submits their phone number, they will receive a verification code through SMS.








```php
<?php
 $return_url = '/twillio/verify_phonecode.php';
 if(!perch_member_logged_in() ){

      perch_twillio_login_form();

      // New customer sign up form
     perch_member_form('register.html');


 }else{
      if(!perch_twillio_is_customerphone_registered()){

       perch_twillio_registration_form();


        }else{
        perch_twillio_customer_confirmPhone_form(  [
                                                       'return_url' => $return_url

                                                     ]);
        }
      }

  ?>
```

