<?php

namespace NTI\PaylianceBundle\Models\Customer;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PLCustomer
 * @package NTI\PaylianceBundle\Models\PLCustomer
 */
class PLCustomer
{

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $Id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $CustomerAccount;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $FirstName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $MiddleName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $LastName;

    /**
     * @var PLCustomerAddress
     * @JMS\Type("NTI\PaylianceBundle\Models\Customer\PLCustomerAddress")
     */
    private $BillingAddress;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $ShippingSameAsBilling;

    /**
     * @var PLCustomerAddress
     * @JMS\Type("NTI\PaylianceBundle\Models\Customer\PLCustomerAddress")
     */
    private $ShippingAddress;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Company;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $AltPhone;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $MobilePhone;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Fax;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Email;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $AltEmail;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Website;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Notes;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $CreatedOn;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $LastModified;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return PLCustomer
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAccount()
    {
        return $this->CustomerAccount;
    }

    /**
     * @param string $CustomerAccount
     * @return PLCustomer
     */
    public function setCustomerAccount($CustomerAccount)
    {
        $this->CustomerAccount = $CustomerAccount;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param string $FirstName
     * @return PLCustomer
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->MiddleName;
    }

    /**
     * @param string $MiddleName
     * @return PLCustomer
     */
    public function setMiddleName($MiddleName)
    {
        $this->MiddleName = $MiddleName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param string $LastName
     * @return PLCustomer
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

    /**
     * @return PLCustomerAddress
     */
    public function getBillingAddress()
    {
        return $this->BillingAddress;
    }

    /**
     * @param PLCustomerAddress $BillingAddress
     * @return PLCustomer
     */
    public function setBillingAddress($BillingAddress)
    {
        $this->BillingAddress = $BillingAddress;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShippingSameAsBilling()
    {
        return $this->ShippingSameAsBilling;
    }

    /**
     * @param bool $ShippingSameAsBilling
     * @return PLCustomer
     */
    public function setShippingSameAsBilling($ShippingSameAsBilling)
    {
        $this->ShippingSameAsBilling = $ShippingSameAsBilling;
        return $this;
    }

    /**
     * @return PLCustomerAddress
     */
    public function getShippingAddress()
    {
        return $this->ShippingAddress;
    }

    /**
     * @param PLCustomerAddress $ShippingAddress
     * @return PLCustomer
     */
    public function setShippingAddress($ShippingAddress)
    {
        $this->ShippingAddress = $ShippingAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->Company;
    }

    /**
     * @param string $Company
     * @return PLCustomer
     */
    public function setCompany($Company)
    {
        $this->Company = $Company;
        return $this;
    }

    /**
     * @return string
     */
    public function getAltPhone()
    {
        return $this->AltPhone;
    }

    /**
     * @param string $AltPhone
     * @return PLCustomer
     */
    public function setAltPhone($AltPhone)
    {
        $this->AltPhone = $AltPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->MobilePhone;
    }

    /**
     * @param string $MobilePhone
     * @return PLCustomer
     */
    public function setMobilePhone($MobilePhone)
    {
        $this->MobilePhone = $MobilePhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->Fax;
    }

    /**
     * @param string $Fax
     * @return PLCustomer
     */
    public function setFax($Fax)
    {
        $this->Fax = $Fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     * @return PLCustomer
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @return string
     */
    public function getAltEmail()
    {
        return $this->AltEmail;
    }

    /**
     * @param string $AltEmail
     * @return PLCustomer
     */
    public function setAltEmail($AltEmail)
    {
        $this->AltEmail = $AltEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->Website;
    }

    /**
     * @param string $Website
     * @return PLCustomer
     */
    public function setWebsite($Website)
    {
        $this->Website = $Website;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->Notes;
    }

    /**
     * @param string $Notes
     * @return PLCustomer
     */
    public function setNotes($Notes)
    {
        $this->Notes = $Notes;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->CreatedOn;
    }

    /**
     * @param string $CreatedOn
     * @return PLCustomer
     */
    public function setCreatedOn($CreatedOn)
    {
        $this->CreatedOn = $CreatedOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastModified()
    {
        return $this->LastModified;
    }

    /**
     * @param string $LastModified
     * @return PLCustomer
     */
    public function setLastModified($LastModified)
    {
        $this->LastModified = $LastModified;
        return $this;
    }

}