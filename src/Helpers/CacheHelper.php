<?php


namespace App\Helpers;

/**
 * Class CacheHelper
 * @package App\Helpers
 */
class CacheHelper
{
    /**
     * @param string $value
     * @return string|string[]|null
     */
    public static function generateKey(string $value)
    {
        return preg_replace('/[^0-9a-zA-Z]/im','_', $value);
    }
}
