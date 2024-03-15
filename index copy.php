<?php

require_once 'ServiceDataProvider.php';
require_once 'ServiceQuery.php';

// Usage: php services.php [COUNTRY_CODE | summary]
if ($argc < 2) {
    echo "Usage: php services.php [COUNTRY_CODE | summary]\n";
    exit(1);
}

$command = strtolower($argv[1]);

$dataProvider = new ServiceDataProvider('services.json');

if ($command === 'summary') {
    $serviceQuery = new ServiceQuery($dataProvider->getData());
    $summary = $serviceQuery->getSummary();
    echo "Summary of services by country:\n";
    foreach ($summary as $countryCode => $count) {
        echo "{$countryCode}: {$count} service(s)\n";
    }
    exit(0);
}

$countryCode = strtoupper($argv[1]);
$serviceQuery = new ServiceQuery($dataProvider->getData());
$services = $serviceQuery->getServicesByCountry($countryCode);

if (empty($services)) {
    echo "No services found for country code '{$countryCode}'.\n";
    exit(0);
}

echo "Services provided by {$countryCode}:\n";
foreach ($services as $service) {
    echo "Service ID: {$service['Ref']}\n";
    echo "Centre Name: {$service['Centre']}\n";
    echo "Service: {$service['Service']}\n";
    echo "----------------------------------------\n";
}
