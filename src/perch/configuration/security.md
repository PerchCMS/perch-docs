---
title: Security Configuration
nav_groups:
  - primary
---

If running Perch or Perch Runway in particularly sensitive environments, you can switch the system into Paranoid Security Mode in the `perch/config/config.php` file.

```php
define('PERCH_PARANOID', true);
```

This mode enables a set of smaller security hardening features in one easy step. If you want to change the defaults or disable certain subfeatures, you can do that with the individual configuration options detailed below.

## Users and passwords

Paranoid security mode affects user accounts in the following ways:

- Requires a password to be entered before editing any user accounts
- Requires an existing password to be entered before updating your own password
- Enforces password length and complexity rules
- Prevents password re-use within a configured time frame
- Enforces case-sensitive usernames
- Implements timed account lock-out for multiple login failures
- Sends new user accounts a tokenised link to create a new password, rather than send their password in the clear
- Enforces secure cookies for user sessions

These subfeatures can be individual controlled with the following settings:

|Setting|Value|Default|
|-|-|-|
|`PERCH_MAX_FAILED_LOGINS`|The number of failed logins before account lockout|`10`|
|`PERCH_AUTH_LOCKOUT_DURATION`|The amount of time to lock the user account for after failed logins|`1 HOUR`|
|`PERCH_STRONG_PASSWORDS`|Enable the 'strong' password rule set|`true`|
|`PERCH_PASSWORD_MIN_LENGTH`|The minimum length for a password|`6`|
|`PERCH_FORCE_SECURE_COOKIES`|Enforce the use of secure cookies (requires SSL/TLS)|`true`|

When `PERCH_MAX_FAILED_LOGINS` is set, the account is locked for `PERCH_AUTH_LOCKOUT_DURATION` when that limit is hit. At that point, the user is sent an email telling them their account has been locked. Nothing changes on the login form when this happens (we want an attacker to waste their effort, not learn that the account has been locked and improve their strategy).

The user can unlock their own account with a password reset - they’re sent a token to do so in the email. This means there’s never a requirement for a higher-level user to unlock a locked account. It’s also impossible for an attacker to completely disable the system by locking everyone out at once. It’s safe to unlock using a password reset, as if the attacker has access to the email account there’s no need to be brute forcing the login in the first place, they could just reset the password over email.

## Files and uploads

Paranoid security mode affects file handling in the following ways:

- Implements the `accepts` attribute on `file` and `image` field types to restrict file uploads to whitelisted mime types
- Filters uploaded files for unsafe file names

These subfeatures can be individual controlled with the following settings:

|Setting|Value|Default|
|-|-|-|
|`PERCH_VERIFY_UPLOADS`|Force uploaded files to be verified for type|`true`|

File uploads are checked for the following, based on [OWASP recommendations](https://www.owasp.org/index.php/Unrestricted_File_Upload)

* File name: must be letters, numbers, dashes, underscores and spaces only, with a single dot and extension.
* File size: must be >0 bytes
* Mime type: must match a whitelist of mime types (see below)
* File extension: must map to a mime type which matches the whitelist

The whitelist of mime types is held within in the `perch/config/filetypes.ini` file. This has been updated for Perch 2.8.26, so if you're updating an older version you’ll need to copy it over.

With `PERCH_VERIFY_UPLOADS` enabled, no file uploads are accepted unless they match all of the above rules. This depends on having the [PHP FileInfo](http://php.net/manual/en/book.fileinfo.php) extension configured and working to be able to detect file mime types.

Image field types (`type="image"`) default to only accepting the mime types from the `webimage` group specified in the `filetypes.ini` file. These are images that you’d normally embed on web pages (`jpg`, `png`, `gif`, `svg`, `webp`).

File field types (`type="file"`) defaults to these groups: `pdf`, `text`, `richtext`, `xml`, `zip`, `audio`, `video`, `office`.

You can override these defaults on a field level by specifying the accept attribute with a comma-delimited list of group names from the `filetypes.ini` file.

    <perch:content id="file" type="file" accept="pdf,zip">

You can also limit the acceptable file size in bytes:

    <perch:content id="file" type="file" accept="pdf,zip" max-file-size="2000000">
