# CLI-Create-Customer-Magento-2

<h3>Magento 2 Module for create customer via CLI command, using csv file.</h3> 

[![CodeFactor](https://www.codefactor.io/repository/github/leonardosilva-10/cli-create-customer-magento-2/badge)](https://www.codefactor.io/repository/github/leonardosilva-10/cli-create-customer-magento-2)

# Requirements

 <h3>Magento 2.4.5</h3>

# How to Install 
 
 - composer require lsbr/clicreate
 - ./bin/magento module:enable LsBr_CliCreate && ./bin/magento setup:upgrade && ./bin/magento setup:di:compile

# How to Use

 - Ex: ./bin/magento customer:import profile-name source

# Future feature

 - Implementation option JSON file.
