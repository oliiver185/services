<?php

class ServiceDataProvider
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function getData()
    {
        $data = json_decode(file_get_contents($this->filename), true);
        if (!$data) {
            throw new Exception("Unable to load data from '{$this->filename}'.");
        }
        return $data;
    }
}