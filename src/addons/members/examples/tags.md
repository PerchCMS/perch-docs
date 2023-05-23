---
title: Member Tags
nav_groups:
  - primary
---

Members’ ability to do things once logged in is controlled by tags. Tags
can be used to control access, group or segment members, or to tie in
with offline systems.

A member can be tagged, and then access is controlled by those tags.
(e.g. “This page is only visible to members tagged with *staff* “.) The
default set of tags a user has is determined by their registration form,
and can be changed afterwards by an administrator or from within your
code.

Once the Members app is installed, pages can be restricted by tag from
the normal page options (a new option appears).

Tags can be assigned to members with an expiry date, so you could be
given a tag for 12 months and it be automatically removed after that.

Parts of a page can be restricted by tag:

```php
<?php if (perch_member_has_tag('boardmember')) {
    perch_content('Financial reports');
};
?>
```

Parts of a template can also be restricted by tag:

```html
<perch:member has-tag="boardmember">
    <p>Contact Bill for more information (direct line: 01234 5667890)</p>
<perch:else:member>
    <p>Please email for more information.</p>
</perch:member>
```
