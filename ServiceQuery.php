<?php

class ServiceQuery
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getServicesByCountry($countryCode)
    {
        return array_filter($this->data, function($service) use ($countryCode) {
            return strtoupper($service['country_code']) === strtoupper($countryCode);
        });
    }

    public function getSummary()
    {
        $summary = array_count_values(array_column($this->data, 'country_code'));
        return $summary;
    }
}
