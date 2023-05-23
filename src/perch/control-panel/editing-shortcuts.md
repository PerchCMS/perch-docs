---
title: Editing Shortcuts
nav_groups:
  - primary
---

Perch 2.4 introduced an option on the Settings page called *Ctrl-E to Edit*. Once switched on, this enables you to browse your site, and then hit the Ctrl-E key combination to jump right into the Perch edit screen for the current page.

This is a good timesaver, and a nice alternative to browsing through your site hierarchy in the Pages list.

## Enabling Ctrl-E to Edit

There are two things you need to do to have this working:

-   Enable the option on the Settings page
-   Add `perch_get_javascript();` to the bottom of your site pages, if
    you’re not using it already. ([docs](/docs/feathers/))

### A note on how the security works

This all might sound alarming. Don’t worry – this doesn’t change the security of your site.

The *Ctrl-E to Edit* JavaScript only gets added to your pages for users who have logged into Perch. They have to log into Perch at least once since the option has been enabled to be able to use the functionality. (We track them with a cookie.)

Once the JavaScript has been added to the page, all it does is redirect the user to that page’s edit URL when they hit the key combination. They still need to be able to log into Perch just as before. This feature does not lessen the security of your site in any way.


## Navigational shortcuts

Perch and Runway define a number of keyboard shortcuts that you can use to more efficiently navigate around the control panel. They're not necessary, but can speed up your workflow once you learn a few.

### Enabling shortcuts

Most of the keyboard shortcuts aren't enabled by default. You need to switch them on under Settings by checking the box alongside "Enable keyboard shortcuts".

The excption is the default _save_ shortcut, which is always enabled on pages with forms. To submit the current form, use `Cmd-S` on a Mac and `Ctrl-S` on Windows.

### Available shortcuts

The following navigational shortcuts are available once shortcuts are enabled. They are all multiple key sequences starting with `g` for _go_. To jump to the page listing, for example, you would press the `g` key followed by the `p` key.

Shortcuts are disabled while using a form field.

| Key sequence | Navigates to |
|--|--|
| `g p` | Page listing |
| `g t` | Category sets (T for _taxonomy_) |
| `g c` | Collections listing (Runway) |
| `g r` | Routes listing (Runway) |
| `g s` | Settings |
| `g d r` | Diagnostics report |
| `g u` | Users listing |
| `g m p` | Master pages listing |
| `g a` | Assets |
