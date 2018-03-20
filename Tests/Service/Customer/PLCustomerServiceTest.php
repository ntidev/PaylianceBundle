<?php

namespace NTI\PaylianceBundle\Tests\Service\Customer;

use NTI\PaylianceBundle\Exception\RequestException;
use NTI\PaylianceBundle\Models\Customer\PLCustomer;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class PLCustomerServiceTest
 * @package NTI\PaylianceBundle\Tests\Service\PLCustomer
 */
class PLCustomerServiceTest extends KernelTestCase
{
    /** @var ContainerInterface $container */
    private $container;

    public function init()
    {
        self::bootKernel();
        $this->container = self::$kernel->getContainer();
    }

    public function testCreateCustomerProfile()
    {
        $this->init();

        $customer = array(
            "FirstName" => "John",
            "LastName" => "Doe",
            "BillingAddress" => array(
                "StreetAddress1" => "1234 Main St.",
                "StreetAddress2" => "",
                "City" => "Columbus",
                "StateCode" => "TX",
                "ZipCode" => "75001"
            ),
            "ShippingSameAsBilling" => "true"
        );

        try {
            $customer = $this->container->get('payliance_api.customer')->create($customer);
        } catch (RequestException $e) {
            $this->fail("An exception occurred while creating the Customer: ".$e->getMessage());
        }

        $this->assertInstanceOf(PLCustomer::class, $customer, "Result was not an instance of PLCustomer.");
    }

    /** @depends testCreateCustomerProfile */
    public function testUpdateCustomerProfile()
    {
        $this->init();

        try {
            $result = $this->container->get('payliance_api.customer')->getAll();
        } catch (RequestException $e) {
            $this->fail("An exception occurred while updating the Customer: ".$e->getMessage());

        }
        if(count($result["Items"]) <= 0) {
            $this->fail("At least one Customer is required in NTI to test the Update process.");
            return;
        }

        /** @var PLCustomer $customer */
        $customer = $result["Items"][0];

        $customer->setCompany(uniqid()."_UNIT_TEST");

        try {
            $result = $this->container->get('payliance_api.customer')->update($customer);
            $this->assertInstanceOf(PLCustomer::class, $result, "The Result was not an instance of PLCustomer.")
        } catch (RequestException $e) {
            $this->fail("An exception occurred while updating the Customer: ".$e->getMessage());
        }
    }

    /** @depends testCreateCustomerProfile */
    public function testGetCustomerProfile() {

        $this->init();

        try {
            $result = $this->container->get('payliance_api.customer')->getAll();
        } catch (RequestException $e) {
            $this->fail("An exception occurred while updating the Customer: " . $e->getMessage());
        }

        if(count($result["Items"]) <= 0) {
            $this->fail("At least one Customer is required in NTI to test the Update process.");
            return;
        }

        /** @var PLCustomer $customer */
        $customer = $result["Items"][0];

        try {
            $result = $this->container->get('payliance_api.customer')->get($customer->getId());
            $this->assertInstanceOf(PLCustomer::class, $result, "The Result was not an instance of PLCustomer.")
        } catch (RequestException $e) {
            $this->fail("An exception occurred while updating the Customer: ".$e->getMessage());
        }
    }

}