<?php

require_once __DIR__.'../vendor/autoload.php';

use Src\Methods;

$cpanel = new Methods([
    'host' => '127.0.0.1',
    'api_key' => 'LKACN0OGIWFVOO5FNYNVZX2NOYOP7GWO',
    'username' => 'root',
    'port' => 2087,
]);

//https://hostname.example.com:2087/cpsess###########/json-api/cpanel?cpanel_jsonapi_user=user&cpanel_jsonapi_apiversion=2&cpanel_jsonapi_module=Cron&cpanel_jsonapi_func=add_line&command=/usr/bin/perl%20/home/username/happynewyear.pl&day=1&hour=0&minute=0&month=1&weekday=*

echo $cpanel->SendWithArray('Cron', 'add_line', 'user', [
    'command' => '/usr/bin/perl%20/home/username/happynewyear.pl',
    'day' => 1,
    'hour' => 0,
    'minute' => 0,
    'month' => 1,
    'weekday' => '*'
]);

// If you don't like using from Array , You can using from this :
echo $cpanel->SendWithQuery('cpanel_jsonapi_user=user&cpanel_jsonapi_apiversion=2&cpanel_jsonapi_module=Cron&cpanel_jsonapi_func=add_line&command=/usr/bin/perl%20/home/username/happynewyear.pl&day=1&hour=0&minute=0&month=1&weekday=*');
// You should copy everything that coming after cpanel?(.*)