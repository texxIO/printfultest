<?php

namespace App\Structures;

/**
 * Class AddressItem
 * @package App\Structures
 */
class AddressItem
{
    private $address1;
    private $city;
    private $country_code;
    private $state_code;
    private $zip;

    /**
     * @return string
     */
    public function getAddress1():string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return AddressItem
     */
    public function setAddress1(string $address1):self
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity():string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return AddressItem
     */
    public function setCity(string $city):self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode():string
    {
        return $this->country_code;
    }

    /**
     * @param string $country_code
     * @return AddressItem
     */
    public function setCountryCode(string $country_code):self
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateCode():?string
    {
        return $this->state_code;
    }

    /**
     * @param string $state_code
     * @return AddressItem
     */
    public function setStateCode(string $state_code):self
    {
        $this->state_code = $state_code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getZip():?string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return AddressItem
     */
    public function setZip(string $zip):self
    {
        $this->zip = $zip;
        return $this;
    }

}
