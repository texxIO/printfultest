<?php

namespace App;

use App\Structures\AddressItem;
use App\Structures\ProductItem;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Simple Printful API call wrapper
 */
class ApiService
{
    private $apiKey;

    /**
     * ApiService constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param ProductItem[] $products
     * @param AddressItem $address
     * @return string
     * @throws GuzzleException
     */
    public function getRates(array $products, AddressItem $address)
    {
        $body = [
            'recipient' => [
                'address1' => $address->getAddress1(),
                'city' => $address->getCity(),
                'country_code' => $address->getCountryCode(),
                // ..
            ],
            'items' => $products ,
        ];


        try {
            $res = (new Client)->request('POST', 'https://api.printful.com/shipping/rates', [
                'headers' => [
                    'authorization' => 'Basic ' . base64_encode($this->apiKey),
                ],
                'body' => json_encode($body),
            ]);
        } catch (ClientException $exception) {
            //write to log $exception $exception->getMessage()
            throw new Exception('API request failed!');
        }

        return $this->parseResponse($res->getBody()->getContents());
    }

    /**
     * @param string $response
     * @return mixed
     */
    private function parseResponse(string $response)
    {
        $responseDecoded = json_decode($response, true);
        if (isset($responseDecoded['result'])) {
            return $responseDecoded['result'];
        }
        //write to log

        return [];
    }
}
