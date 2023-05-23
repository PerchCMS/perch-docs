---
title: UI Customisations
nav_groups:
  - primary
nav_sort: 3
---

The Perch control panel interface can be customised with your own CSS and JavaScript. This is useful if you want to make small tweaks to the way something behaves, or just to customise things to suit your client or project.

## How to use

UI customisations are made by placing your files in the `perch/addons/plugins/ui` folder. Depending on your installation, this folder may or may not exist. You can create it if it's not there.

This folder includes a special file `_config.inc`. This file gets included at the bottom of all Perch control panel pages, at a point where all existing JavaScript and CSS has already been applied. The jQuery JavaScript library is available.

Edit the `_config.inc` file to add a link to your own files.

```markup
<link rel="stylesheet" href="/perch/addons/plugins/ui/my_css_file.css">
<script src="/perch/addons/plugins/ui/my_javascript_file.js"></script>
```

This really just provides a mechanism to hook your own files into the interface without needing to edit any core Perch files. This means that your changes won’t need to be re-done each time you update Perch. However, be sure to test your changes after updating Perch in case anything that affects you has changed.

(We appreciate that the end of the page is not the most super-ideal place to be adding new CSS files. If making big changes where this could be an issue, it may be betting to look at implementing your code with an app instead.)