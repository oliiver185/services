<?php
// ServiceDataProviderTest.php
use PHPUnit\Framework\TestCase;

// Include the ServiceDataProvider class definition
require_once 'ServiceDataProvider.php';

class ServiceDataProviderTest extends TestCase
{
    public function testGetData()
    {
        // Assuming ServiceDataProvider is correctly implemented
        // and loads data from a JSON file
        $dataProvider = new ServiceDataProvider('services.json');
        $data = $dataProvider->getData();

        // Assert that the returned data is not empty
        $this->assertNotEmpty($data);

        // Add more assertions as needed to test the behavior of ServiceDataProvider
    }
}
?>
