---
title: Tokens
nav_groups:
  - primary
nav_sort: 1
---

Runway has a number of built in routing tokens, ready to use. They cover many common patterns. If your needs go beyond those, you can [define custom tokens](/runway/routing/custom-tokens/) with no performance overhead.

The default tokens have a bias towards a latin character set.

|Token|Matches|Example|
|-|-|
|`*`|Anything||
|`i`|Integers|`1000`|
|`a`|Letters a-z|`m`|
|`slug`|Letters a-z, numbers 0-9 and dashes|`olympic-games-2016`|
|`year`|Four-digit year from 1000 to 2999|`2015`|
|`isodate`|ISO date format|`2015-12-25`|

