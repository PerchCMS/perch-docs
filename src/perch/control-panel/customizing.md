---
title: Customizing
nav_groups:
  - primary
---

The Perch Control Panel can be customized in a variety of ways, from installing editors and apps, to adding your own CSS and JavaScript.

If you simply want to add your own logo, or change the colours of the admin UI then this can be achieved via the Control Panel itself – see the section in these docs about [Branding](/perch/control-panel/branding).

If you want to customize the Control Panel further – perhaps to add some JavaScript or make more extensive CSS changes then we have provide a method to inject your own UI Customizations, without having to re-do the work each time you upgrade Perch.

## How to use

UI customizations are made by placing your files in the `perch/addons/plugins/ui` folder. Depending on your installation, this folder may or may not exist. You can create it if it's not there.

This folder includes a special file `_config.inc`. This file gets included at the bottom of all Perch control panel pages, at a point where all existing JavaScript and CSS has already been applied. The jQuery JavaScript library is available.

Edit the `_config.inc` file to add a link to your own files.

```html
<link rel="stylesheet" href="/perch/addons/plugins/ui/my_css_file.css">
<script src="/perch/addons/plugins/ui/my_javascript_file.js"></script>
```

This really just provides a mechanism to hook your own files into the interface without needing to edit any core Perch files. This means that your changes won’t need to be re-done each time you update Perch. However, be sure to test your changes after updating Perch in case anything that affects you has changed.

(We appreciate that the end of the page is not the most super-ideal place to be adding new CSS files. If making big changes where this could be an issue, it may be better to look at implementing your code [with an app](/api) instead.)
