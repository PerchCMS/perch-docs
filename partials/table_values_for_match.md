| Value      | Aliases       | Description                                                         |
| ---------- | ------------- | ------------------------------------------------------------------- |
| eq         | `is`, `exact` | equal to                                                            |
| neq        | `not`, `!eq`  | not equal to                                                        |
| gt         |               | greater than                                                        |
| gte        |               | greater than or equal to                                            |
| lt         |               | less than                                                           |
| lte        |               | less than or equal to                                               |
| contains   |               | the value exists within the content (a simple search)               |
| !contains  |               | opposite of `contains`: the value does not exist within the content |
| regex      | `regexp`      | using a PCRE regular expression                                     |
| between    |               | match between two values                                            |
| !between   |               | opposite of `between`                                               |
| eqbetween  |               | match between two values inclusively                                |
| !eqbetween |               | opposite of `eqbetween`                                             |
| in         | `within`      | match within a comma delimited content list (like a list of tags)   |
| !in        | `!within`     | opposite of `in`                                                    |
