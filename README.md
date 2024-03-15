# SERVICES

## Installation

To run this project, you need to have Composer installed on your system. If you don't have Composer installed, you can download it from [Composer's official website](https://getcomposer.org/).
Once Composer is installed, navigate to the project directory.


# This command allows to query data bases on COUNTRY CODE
## Please run this script from the command line:

php index.php fr

# To get a summary of services by country 
## Please run this script from the command line with the following command:

php index.php summary

## Running Tests

To run the tests, please execute the following command in your terminal:

 ./vendor/bin/phpunit ServiceDataProviderTest.php
  ./vendor/bin/phpunit ServiceQueryTest.php