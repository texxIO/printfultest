<?php

namespace App\Adapters\Storage;

/**
 * Class FileStorageAdapter
 * @package App\Adapters\Storage
 */
class FileStorageAdapter
{
    private $filePath;
    private $filename;
    /**
     * FileStorageAdapter constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath . '/';
    }

    /**
     * @param string $filename
     * @return FileStorageAdapter
     */
    public function setFile(string $filename):self
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @param string $content
     * @return bool|int
     */
    public function write(string $content)
    {
        return file_put_contents($this->filePath.$this->filename,$content );
    }

    /**
     * @param string $key
     * @return bool
     */
    public function delete(string $key)
    {
        return unlink($this->filePath.$this->filename);
    }

    /**
     * @return false|string
     */
    public function read()
    {
        if (file_exists($this->filePath.$this->filename))
        {
            return file_get_contents($this->filePath.$this->filename);
        }

    }
}
