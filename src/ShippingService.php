<?php

namespace App;

use App\Decorators\ProductItemDecorator;
use App\Helpers\CacheHelper;
use App\Interfaces\CacheInterface;
use App\Structures\AddressItem;
use App\Structures\ProductItem;
use GuzzleHttp\Exception\GuzzleException;
use Exception;


class ShippingService
{
    private $api;
    private $cache;

    public function __construct(ApiService $api, CacheInterface $cache)
    {
        $this->api = $api;
        $this->cache = $cache;
    }

    /**
     * @param ProductItem[] $products
     * @param AddressItem $address
     * @return array
     * @throws GuzzleException
     */
    public function getRates(array $products, AddressItem $address): array
    {
        $cacheKey = $this->getShippingCacheKey($products, $address);
        $rates = $this->cache->get($cacheKey);

        if ($rates) {
            return $rates;
        }

        try {

            $rates = $this->api->getRates($this->buildRequestProducts($products), $address);
            $this->cache->set($cacheKey, $rates, 100);
        } catch (Exception $exception) {
            //writer to log
            return [];
        }

        return $rates;
    }

    /**
     * @param array $products
     * @param AddressItem $addressItem
     * @return string
     */
    private function getShippingCacheKey(array $products, AddressItem $addressItem): string
    {
        $key = [];
        foreach ($products as $product) {

            $key[] = $product->getVariantId();
            $key[] = $product->getQuantity();
        }

        $key[] = $addressItem->getAddress1();
        $key[] = $addressItem->getCity();
        $key[] = $addressItem->getCountryCode();
        $key[] = $addressItem->getZip();

        return CacheHelper::generateKey(implode("_", $key));
    }

    /**
     * @param array $products
     * @return array
     */
    private function buildRequestProducts( array $products)
    {
        $return = [];
        foreach ( $products as $product )
        {
            $return[] =(new ProductItemDecorator($product))->toArray();
        }
        return $return;
    }
}
