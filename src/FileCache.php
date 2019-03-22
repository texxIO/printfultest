<?php

namespace App;

use App\Interfaces\CacheInterface;

class FileCache implements CacheInterface
{
    /**
     * @inheritdoc
     */
    public function set(string $key, $value, int $duration)
    {
        // TODO: Implement set() method.
    }

    /**
     * @inheritdoc
     */
    public function get(string $key)
    {
        // TODO: Implement get() method.
    }
}