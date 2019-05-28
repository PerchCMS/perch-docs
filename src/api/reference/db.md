---
title: Database
nav_groups:
  - primary
---

The core database class `PerchDB` provides a basic set of tools for getting data in and out of the database. It uses a single database connection, so you should use `PerchDB` when possible.

An instance of `PerchDB` is available in the `db` property of both `PerchAPI_Factory` and `PerchAPI_Base`, so the preferred way of accessing is simply to use `$this->db` in a subclass of one of those two classes.

If you need to access `PerchDB` otherwise, you can get an instance:

```php
$DB = PerchDB::fetch();
```

## Methods

The class exposes a number of methods.

### PerchDB::execute(string $sql)

Takes a raw SQL string and executes it against the database.

```php
$this->db->execute('DROP my_table');
```

### PerchDB::get_rows(string $sql)

Takes a SELECT statement and returns an array of associative arrays for each matching row.

```php
$this->db->get_rows('SELECT * FROM my_table');
```

### PerchDB::get_row(string $sql)

Takes a SELECT statement designed to return a single row and returns an associative array of the matching row.

```php
$this->db->get_row('SELECT * FROM my_table WHERE articleID=1 LIMIT 1');
```

### PerchDB::get_value(string $sql)

Takes a SELECT statement designed to return a single value and returns it.

```php
$this->db->get_value('SELECT articleTitle FROM my_table WHERE articleID=1 LIMIT 1');
```

### PerchDB::get_count(string $sql)

Takes a SELECT COUNT statement and returns the count as an integer.

```php
$this->db->get_count('SELECT COUNT(*) FROM my_table');
```

### PerchDB::insert(string $table, array \data)

Takes an associative array with keys matching table column names and inserts into the given table. If the table uses an autonumbered primary key, returns the new ID.

```php
$data = array();
$data['articleTitle'] = 'My article';
$data['articleDate'] = date('Y-m-d');
$newID = $this->db->insert('my_table', $data);
```

### PerchDB::update(string $table, array $data, string $column, string $id)

Takes an associative array with keys matching table column names and updates the given table, where `$column` equals `$id`.

```php
$data = array();
$data['articleTitle'] = 'My article';
$data['articleDate'] = date('Y-m-d');
$newID = $this->db->update('my_table', $data, 'articleID', '3');
```

### PerchDB::delete(string $table, string $column, string $id [, int $limit])

Deletes from the given table, where `$column` equals `$id`. The number of rows to delete can be limited with `$limit`.

```php
$this->db->delete('my_table', 'articleID', '3');
```

### PerchDB::pdb(mixed $value)

Takes a value and prepares it for use in an SQL statement by escaping any quotes and then wrapping it in quotes. Integers are left unwrapped.

```php
$sql = 'SELECT * FROM my_table WHERE articleID='.$this->db->pdb(3);
// becomes:
SELECT * FROM my_table WHERE articleID=3
```

And,

```php
$sql = 'SELECT * FROM my_table WHERE articleTitle='.$this->db->pdb('My article');
// becomes:
SELECT * FROM my_table WHERE articleTitle='My article'
```

### PerchDB::get_table_meta(string $table)

Returns an associative array of meta information about the given table’s structure.


