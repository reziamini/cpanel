# Cpanel
A simple library for using from Cpanel-API easily
You can using from this library for working easily with Cpanel-API.

### Install Guide :
```shell
composer require aminireza-ir/cpanel
```

How to Connect to Cpanel : 
```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Src\Methods;

$cpanel = new Methods([
    'host' => '127.0.0.1',
    'api_key' => 'LKACN0OGIWFVOO5FNYNVZX2NOYOP7GWO',
    'username' => 'root',
    'port' => 2087,
]);

echo $cpanel->SendWithArray('Bandwidth', 'getbwdata', 'username');

```
* If you want to use password you should follow this code : 

```php
<?php

$cpanel = new Methods([
    'host' => '127.0.0.1',
    'password' => '!password1234',
    'username' => 'root',
    'port' => 2087,
]);

```

### Examples

You can see a simple example to add a new cron job in cpanel :
```php
<?php

$cpanel->SendWithArray('Cron', 'add_line', 'user', [
    'command' => '/usr/bin/perl%20/home/username/happynewyear.pl',
    'day' => 1,
    'hour' => 0,
    'minute' => 0,
    'month' => 1,
    'weekday' => '*'
]);

```
