<?php

namespace NTI\PaylianceBundle\Models\Customer;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

class PLCustomerAddress
{

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Address1 is required for the billing information")
     * @Assert\Length(
     *      max = 250,
     *      maxMessage = "The Address1 cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("StreetAddress1")
     * @JMS\Type("string")
     */
    private $StreetAddress1;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = 250,
     *      maxMessage = "The Address2 cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("StreetAddress2")
     * @JMS\Type("string")
     */
    private $StreetAddress2;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The City is required for the billing information")
     * @Assert\Length(
     *      max = 100,
     *      maxMessage = "The City cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("City")
     * @JMS\Type("string")
     */
    private $City;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The State is required for the billing information")
     * @Assert\Length(
     *      max = 2,
     *      maxMessage = "The State cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("StateCode")
     * @JMS\Type("string")
     */
    private $StateCode;


    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Zipcode is required for the billing information.")
     * @Assert\Length(
     *      max = 10,
     *      maxMessage = "The Zipcode cannot be longer than {{ limit }} characters"
     * )
     * @JMS\SerializedName("ZipCode")
     * @JMS\Type("string")
     */
    private $ZipCode;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = 3,
     *      maxMessage = "The Country cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("Country")
     * @JMS\Type("string")
     */
    private $Country;

    /**
     * PLCustomerAddress constructor.
     */
    public function __construct() {
        $this->setCountry("US");
    }


    /**
     * @return string
     */
    public function getStreetAddress1()
    {
        return $this->StreetAddress1;
    }

    /**
     * @param string $StreetAddress1
     * @return PLCustomerAddress
     */
    public function setStreetAddress1($StreetAddress1)
    {
        $this->StreetAddress1 = $StreetAddress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAddress2()
    {
        return $this->StreetAddress2;
    }

    /**
     * @param string $StreetAddress2
     * @return PLCustomerAddress
     */
    public function setStreetAddress2($StreetAddress2)
    {
        $this->StreetAddress2 = $StreetAddress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return PLCustomerAddress
     */
    public function setCity($City)
    {
        $this->City = $City;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateCode()
    {
        return $this->StateCode;
    }

    /**
     * @param string $StateCode
     * @return PLCustomerAddress
     */
    public function setStateCode($StateCode)
    {
        $this->StateCode = $StateCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->ZipCode;
    }

    /**
     * @param string $ZipCode
     * @return PLCustomerAddress
     */
    public function setZipCode($ZipCode)
    {
        $this->ZipCode = $ZipCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param string $Country
     * @return PLCustomerAddress
     */
    public function setCountry($Country)
    {
        $this->Country = $Country;
        return $this;
    }


}