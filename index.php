<?php

// Include the necessary classes
require_once 'ServiceDataProvider.php';
require_once 'ServiceQuery.php';

// Usage: php services.php [COUNTRY_CODE | summary]
// Check if the correct number of command-line arguments is provided
if ($argc < 2) {
    echo "Usage: php services.php [COUNTRY_CODE | summary]\n";
    exit(1); // Exit with status code 1 indicating an error
}

// Retrieve the command-line argument
$command = strtolower($argv[1]);

// Create an instance of ServiceDataProvider to retrieve data from the JSON file
$dataProvider = new ServiceDataProvider('services.json');

// Check if the command is to display a summary of services
if ($command === 'summary') {
    // Create an instance of ServiceQuery with the data from ServiceDataProvider
    $serviceQuery = new ServiceQuery($dataProvider->getData());
    // Get the summary of services by country
    $summary = $serviceQuery->getSummary();
    // Display the summary
    echo "Summary of services by country:\n";
    foreach ($summary as $countryCode => $count) {
        echo "{$countryCode}: {$count} service(s)\n";
    }
    exit(0); // Exit with status code 0 indicating successful execution
}

// If the command is not 'summary', assume it's a country code
$countryCode = strtoupper($argv[1]);

// Create an instance of ServiceQuery with the data from ServiceDataProvider
$serviceQuery = new ServiceQuery($dataProvider->getData());
// Get the services for the specified country code
$services = $serviceQuery->getServicesByCountry($countryCode);

// If no services are found for the country code, display a message
if (empty($services)) {
    echo "No services found for country code '{$countryCode}'.\n";
    exit(0); // Exit with status code 0 indicating successful execution
}

// Display the services provided by the specified country code
echo "Services provided by {$countryCode}:\n";
foreach ($services as $service) {
    echo "Service ID: {$service['Ref']}\n";
    echo "Centre Name: {$service['Centre']}\n";
    echo "Service: {$service['Service']}\n";
    echo "----------------------------------------\n";
}
