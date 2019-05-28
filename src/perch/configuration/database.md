---
title: Database Configuration
nav_groups:
  - primary
---

The following values relate to how Perch connects to your database. If you are having trouble connecting to the database then run the Perch Compatibility Test. Then use the values that give you a pass for that test in Perch Setup or copied directly into your Config File.

The defaults created at setup will work for most people. There are some additional settings listed below that will help if your host gives you specific instructions.

## Database Values

|Setting|Value|
|-|-|
|PERCH_DB_USERNAME|The database user account username|
|PERCH_DB_PASSWORD|The database user account password|
|PERCH_DB_SERVER|The database server host name or IP address. Often localhost.|
|PERCH_DB_DATABASE|The name of the database|
|PERCH_DB_PREFIX|The database table name prefix. Defaults to perch_ or perch2_. Can be changed to host multiple installs in one database|
|PERCH_DB_CHARSET|The character set to use for the database connection. Defaults to utf8.|
|PERCH_DB_PORT|The port on which to connect to the database server.|
|PERCH_DB_SOCKET|The unix socket path to use.|
|PERCH_ERROR_MODE|Can be set to ECHO to help diagnose database connection problems. Defaults to SILENT so that errors are not displayed on your site (e.g. if the DB server goes down).|
