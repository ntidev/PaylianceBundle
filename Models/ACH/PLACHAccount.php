<?php

namespace NTI\PaylianceBundle\Models\ACH;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PLACHAccount
 * @package NTI\PaylianceBundle\Models\ACH
 */
class PLACHAccount
{

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $AccountNumber;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $RoutingNumber;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $BankName;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $IsCheckingAccount;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $Id;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $CustomerId;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $IsDefault;

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
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }

    /**
     * @param string $AccountNumber
     * @return PLACHAccount
     */
    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->RoutingNumber;
    }

    /**
     * @param string $RoutingNumber
     * @return PLACHAccount
     */
    public function setRoutingNumber($RoutingNumber)
    {
        $this->RoutingNumber = $RoutingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->BankName;
    }

    /**
     * @param string $BankName
     * @return PLACHAccount
     */
    public function setBankName($BankName)
    {
        $this->BankName = $BankName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCheckingAccount()
    {
        return $this->IsCheckingAccount;
    }

    /**
     * @param bool $IsCheckingAccount
     * @return PLACHAccount
     */
    public function setIsCheckingAccount($IsCheckingAccount)
    {
        $this->IsCheckingAccount = $IsCheckingAccount;
        return $this;
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
     * @return PLACHAccount
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->CustomerId;
    }

    /**
     * @param int $CustomerId
     * @return PLACHAccount
     */
    public function setCustomerId($CustomerId)
    {
        $this->CustomerId = $CustomerId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault()
    {
        return $this->IsDefault;
    }

    /**
     * @param bool $IsDefault
     * @return PLACHAccount
     */
    public function setIsDefault($IsDefault)
    {
        $this->IsDefault = $IsDefault;
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
     * @return PLACHAccount
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
     * @return PLACHAccount
     */
    public function setLastModified($LastModified)
    {
        $this->LastModified = $LastModified;
        return $this;
    }

}