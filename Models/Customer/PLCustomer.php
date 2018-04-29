<?php

namespace NTI\PaylianceBundle\Models\Customer;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

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
     *
     * @Assert\NotBlank(message="The Customer Account Number is required for the billing information")
     * @Assert\Length(
     *      max = 28,
     *      maxMessage = "The Customer Account Number cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("CustomerAccount")
     * @JMS\Type("string")
     */
    private $CustomerAccount;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Firstname is required for the billing information")
     * @Assert\Length(
     *      max = 150,
     *      maxMessage = "The Firstname cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("FirstName")
     * @JMS\Type("string")
     */
    private $FirstName;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Lastname is required for the billing information")
     * @Assert\Length(
     *      max = 150,
     *      maxMessage = "The Lastname cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("LastName")
     * @JMS\Type("string")
     */
    private $LastName;

    /**
     * @var PLCustomerAddress
     *
     * @Assert\Valid()
     * @JMS\Type("NTI\PaylianceBundle\Models\Customer\PLCustomerAddress")
     */
    private $BillingAddress;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ShippingSameAsBilling")
     */
    private $ShippingSameAsBilling;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Company is required for the billing information")
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "The Company cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("Company")
     * @JMS\Type("string")
     */
    private $Company;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Email is required for the billing information.")
     * @Assert\Email(message="The Email address is not valid.")
     * @JMS\SerializedName("Email")
     * @JMS\Type("string")
     */
    private $Email;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = 2048,
     *      maxMessage = "The Notes cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("Notes")
     * @JMS\Type("string")
     */
    private $Notes;

    /**
     * @var array
     *
     * @Assert\Valid()
     * @JMS\Type("array<NTI\PaylianceBundle\Models\ACH\PLACHAccount>")
     * @JMS\SerializedName("paymentProfiles")
     */
    private $paymentProfiles;

    /**
     * PLCustomer constructor.
     */
    public function __construct()
    {
        $this->setShippingSameAsBilling("true");
    }


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
     * @return string
     */
    public function isShippingSameAsBilling()
    {
        return $this->ShippingSameAsBilling;
    }

    /**
     * @param string $ShippingSameAsBilling
     * @return PLCustomer
     */
    public function setShippingSameAsBilling($ShippingSameAsBilling)
    {
        $this->ShippingSameAsBilling = $ShippingSameAsBilling;
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
     * @return array
     */
    public function getPaymentProfiles()
    {
        return $this->paymentProfiles;
    }

    /**
     * @param array $paymentProfiles
     * @return PLCustomer
     */
    public function setPaymentProfiles($paymentProfiles)
    {
        $this->paymentProfiles = $paymentProfiles;
        return $this;
    }

}