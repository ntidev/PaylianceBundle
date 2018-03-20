## Payliance ReceivablePro Integration Symfony2

### Description

This bundle is used to integrate with ReceivablesPro from Payliance in order to process ACH payments.

### Requirements

This bundle depends strictly on the following:

1. https://github.com/schmittjoh/JMSSerializerBundle (In order to handle serialization/deserialization of Payliance's API interactions)
2. http://docs.guzzlephp.org/en/stable/overview.html (Used to make HTTP/s requests.)
3. https://github.com/craue/CraueConfigBundle (Used to store the configuration of Payliance's API)

### Installation

1. Install the bundle using composer

    ```
    $ composer require nti/payliance-bundle
    ```
    
 2. Register the bundle inside the `AppKernel.php`
 
    ```
        public function registerBundles()
        {
           ...
           new NTI\PaylianceBundle\NTIPaylianceBundle(),
        }            
    ```
    
 3. Create the necessary configurations on the `craue_config_setting` table. See the file `SQL/payliance_craue_config_setting.sql` for the list of configurations. 

### Usage

There are 3 services that can be used: `PLCustomerService`, `PLACHAccountService`, `PLPaymentService`

### Todo

 -  Include recurring and scheduling options for payments
 -  Include samples of how to use the services
 -  Complete Unit Testing
 -  Add Travis CI
 -  Sphinx Documentation