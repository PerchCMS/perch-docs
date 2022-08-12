---
title: Chat
nav_groups:
  - primary
---


Using `type="chat"` will create a field so the administrator can sect the messenger api version available by Facebook that time.


### Adding your Facebook PAGE ID

To set your Facebook PAGE ID for use with the fieldtype, add it to your `perch/config/config.php` file:


```php
define('PERCH_CHAT_PAGE_ID', 'abc123');
```

## Steps for setup  Messenger Chat on your website (first way)

1. Go to https://business.facebook.com
2. Log in or Create an account
3. Copy & Paste the asset_id from the link of your facebook page
4. Add the asset_id in the config.php file ("PERCH_MESSENGER_PAGE_ID", "your page id")
5. Go to https://developers.facebook.com/tools/explorer/
6. Click on User or Page and select your page under Page Access Tokens
7. Add the following permissions
  pages_show_list
  pages_messaging
  pages_read_engagement
  pages_manage_metadata
8. Click Generate Access Token
9. Go to https://developers.facebook.com/docs/messenger-platform/webview/extensions
10. In Step 1 (whitelist your domain) Copy & Paste the API to your terminal and change the PAGE_ACCESS_TOKEN with your Access Token and the domain name with the domain name of your website

## Steps Using the Meta Business Suite (second way)
1. Go to https://business.facebook.com
2. Log in or Create an account
3. Click Page Settings and then click Messaging
4. Click the Get Started button which will be below "Add Messenger to your website"
5. Click the button Set up and Choose a setup method
6. Select language
7. Add the domain name of your website
8. Click Save and Continue
9. On the Copy Code step copy your page id where you can find near page_id
10. Paste the page_id in your config file ("PERCH_MESSENGER_PAGE_ID", "your page id")


```html
<perch:content id="chat" type="chat" >
```


## Displaying chat icon

Create the chat region and set to the chat template.
```php
  perch_content('Chat')
```
