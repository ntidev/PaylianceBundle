<?php

namespace NTI\PaylianceBundle\Models\Customer;

use JMS\Serializer\Annotation as JMS;

class PLCustomerAddress
{

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $StreetAddress1;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $StreetAddress2;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $City;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $StateCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $ZipCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Country;

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