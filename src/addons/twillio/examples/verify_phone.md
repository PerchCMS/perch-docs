---
title: Member Verifies Phone
nav_groups:
  - primary
---


After the member submits the form to verify their phone, they are redirected to a form for entering the verification code received via SMS on their phone.





```php
<?php if(!perch_twillio_customer_verified()){
verify_customer_from_form();
}else{
echo "phone is verified!";
}

 ?>```
