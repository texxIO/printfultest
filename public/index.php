<?php
require __DIR__ . '/../vendor/autoload.php';

use App\ApiService;
use App\ShippingService;
use App\Structures\AddressItem;
use App\Structures\ProductItem;
use App\FileCache;
use App\Adapters\Storage\FileStorageAdapter;
use Dotenv\Dotenv;

$dotenv = Dotenv::create(realpath('../'));
$dotenv->load();

$api = new ApiService(getenv('API_KEY'));

$cachePath = new FileStorageAdapter(realpath('../cache'));

if ($cachePath){
    $cache = new FileCache($cachePath);
}else{
    exit('Cache folder not found!');
}


$service = new ShippingService($api, $cache);

$product1 = new ProductItem;
$product1->setVariantId(7679);
$product1->setQuantity(2);

//just a test
//$product2 = new ProductItem;
//$product2->setVariantId(7676);
//$product2->setQuantity(2);

$orderItems = [$product1];


$address = new AddressItem;
$address->setAddress1('11025 Westlake Dr');
$address->setCity('Charlotte');
$address->setCountryCode('NC');
$address->setZip('28273');


$rates = $service->getRates($orderItems, $address);

echo "<pre>" . print_r($rates,1) . "</pre>";
