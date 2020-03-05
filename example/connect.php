<?php

require_once __DIR__.'../vendor/autoload.php';

use Src\Methods;

$cpanel = new Methods([
    'host' => '127.0.0.1',
    'api_key' => 'LKACN0OGIWFVOO5FNYNVZX2NOYOP7GWO',
    'username' => 'root',
    'port' => 2087,
]);

echo $cpanel->SendWithArray('Bandwidth', 'getbwdata', 'username');