<?php
require __DIR__ . '/../vendor/autoload.php';

use App\ApiService;
use App\ShippingService;
use App\Structures\AddressItem;

require __DIR__ . '/../src/Structures/AddressItem.php';
require __DIR__ . '/../src/Structures/OrderItem.php';
require __DIR__ . '/../src/ApiService.php';
require __DIR__ . '/../src/Interfaces/CacheInterface.php';
require __DIR__ . '/../src/FileCache.php';
require __DIR__ . '/../src/ShippingService.php';

$api = new ApiService('');

$orderItems = [];
$address = new AddressItem;

$cache = null;
$service = new ShippingService($api, $cache);

$rates = $service->getRates($orderItems, $address);

print_r($rates);