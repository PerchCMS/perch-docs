---
title: Chat
nav_groups:
  - primary
---

Using `type="chat"` embeds Messenger Chat in the page.

### Adding your Facebook PAGE ID

To set your Facebook PAGE ID for use with the fieldtype, add it to your `perch/config/config.php` file:

```php
define('PERCH_CHAT_PAGE_ID', 'abc123');
```


```html
<perch:content id="chat" type="chat" >
```



