<?php

namespace App;

use App\Structures\AddressItem;
use App\Structures\OrderItem;
use GuzzleHttp\Client;

/**
 * Simple Printful API call wrapper
 */
class ApiService
{
    private $apiKey;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
     * @param OrderItem[] $items
     * @param AddressItem $address
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRates(array $items, AddressItem $address)
    {
        // TODO fix the code
        $body = [
            'recipient' => [
                'country_code' => 'LV',
            ],
            'items' => [
                [
                    'variant_id' => 100,
                    'quantity' => 1,
                ],
            ],
        ];
        $res = (new Client)->request('POST', 'https://api.printful.com/shipping/rates', [
            'headers' => [
                'authorization' => 'Basic ' . base64_encode($this->apiKey),
            ],
            'body' => json_encode($body),
        ]);
        return $res->getBody()->getContents();
    }
}