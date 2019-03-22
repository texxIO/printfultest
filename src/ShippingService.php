<?php

namespace App;

use App\Interfaces\CacheInterface;
use App\Structures\AddressItem;
use App\Structures\ProductItem;

class ShippingService
{
    public function __construct(ApiService $api, CacheInterface $cache)
    {
    }

    /**
     * @param ProductItem[] $products
     * @param AddressItem $address
     * @return array
     */
    public function getRates(array $products, AddressItem $address): array
    {
        // Implement rate retrieval and caching
        return [];
    }
}