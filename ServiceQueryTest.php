<?php

use PHPUnit\Framework\TestCase;

require_once 'ServiceQuery.php';
require_once 'ServiceDataProvider.php';

class ServiceQueryTest extends TestCase
{
    public function testGetServicesByCountry()
    {
        // Assuming ServiceQuery is correctly implemented
        // and provides methods to filter services by country
        $dataProvider = new ServiceDataProvider('services.json');
        $serviceQuery = new ServiceQuery($dataProvider->getData());

        // Test the behavior of getServicesByCountry method
        $services = $serviceQuery->getServicesByCountry('DE');

        // Assert that the returned services array is not empty
        $this->assertNotEmpty($services);

        // Add more assertions as needed to test other methods of ServiceQuery
    }

    public function testGetSummary()
    {
        // Test the behavior of getSummary method
        $dataProvider = new ServiceDataProvider('services.json');
        $serviceQuery = new ServiceQuery($dataProvider->getData());

        $summary = $serviceQuery->getSummary();

        // Assert that the summary is in the expected format
        $this->assertIsArray($summary);
        // Add more assertions as needed
    }
}
