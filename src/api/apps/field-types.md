---
title: Field types
nav_sort: 5
nav_groups:
  - primary
---

By convention, the `fieldtypes.php` file is a good location to include any field types that your app wishes to declare. You'd then include it from your `admin.php` file, and if necessary, from your `runtime.php` file too.

```php
<?php
	class PerchFieldType_bananas extends PerchFieldType {
		...
	}
```