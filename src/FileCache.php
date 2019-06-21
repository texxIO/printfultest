<?php

namespace App;

use App\Adapters\Storage\FileStorageAdapter;
use App\Interfaces\CacheInterface;

class FileCache implements CacheInterface
{
    /** @var FileStorageAdapter $storage */
    private $storage;

    public function __construct(FileStorageAdapter $fileStorageAdapter)
    {
        $this->storage = $fileStorageAdapter;
    }

    /**
     * @inheritdoc
     */
    public function set(string $key, $value, int $duration)
    {

        if (is_array($value)) {
            $value['expire_at'] = $this->setExpireDate($duration);
        }

        $value = json_encode($value);

        $this->storage
            ->setFile($key)
            ->write($value);
    }

    /**
     * @inheritdoc
     */
    public function get(string $key)
    {

        $value = $this->storage
            ->setFile($key)
            ->read();

        if (!$value) {
            return false;
        }

        $value = json_decode($value, true);

        if ($this->isExpired($value) === false) {
            return $value;
        }
        $this->storage->delete($key);


        return false;
    }

    /**
     * @param int $duration
     * @return string
     * @throws \Exception
     */
    private function setExpireDate(int $duration)
    {
        $date = new \DateTime();
        $date->add(\DateInterval::createFromDateString("$duration seconds"));
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @param array $value
     * @return bool
     * @throws \Exception
     */
    public function isExpired(array $value)
    {
        if ( !isset($value['expire_at']) )
        {
            return false;
        }
        $currentDate = new \DateTime();

        $fileExpireDate = \DateTime::createFromFormat('Y-m-d H:i:s', $value['expire_at']);

        if ($fileExpireDate && ($currentDate > $fileExpireDate)) {

            return true;
        }

        return false;
    }


}
