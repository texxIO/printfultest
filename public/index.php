<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Structures\AddressItem;

require __DIR__ . '/../src/Structures/AddressItem.php';
require __DIR__ . '/../src/Structures/OrderItem.php';
require __DIR__ . '/../src/ApiService.php';
require __DIR__ . '/../src/Interfaces/CacheInterface.php';
require __DIR__ . '/../src/FileCache.php';

$api = new \App\ApiService('');

$orderItems = [];
$address = new AddressItem;


// print_r($api->getRates($orderItems, $address));

$cache = null; // FIXME
$service = new \App\ShippingService($api, $cache);
$service->getRates($orderItems, $address);