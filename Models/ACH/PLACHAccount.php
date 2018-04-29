<?php

namespace NTI\PaylianceBundle\Models\ACH;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PLACHAccount
 * @package NTI\PaylianceBundle\Models\ACH
 */
class PLACHAccount
{
    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Account Number is required for the billing information")
     * @Assert\Regex("/^\*+\d+|\d+/", message="The Account Number should only contain numbers")
     * @Assert\Length(
     *      min = 4,
     *      max = 100,
     *      minMessage = "The Account Number cannot be shorter than {{ limit }} digits",
     *      maxMessage = "The Account Number cannot be longer than {{ limit }} digits"
     * )
     * @JMS\SerializedName("AccountNumber")
     * @JMS\Type("string")
     */
    private $AccountNumber;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Routing Number is required for the billing information")
     * @Assert\Regex("/^\d+/", message="The Routing Number should only contain numbers")
     * @Assert\Length(
     *      min = 9,
     *      max = 9,
     *      exactMessage = "The Routing Number should contain {{ limit }} digits"
     * )
     * @JMS\SerializedName("RoutingNumber")
     * @JMS\Type("string")
     */
    private $RoutingNumber;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="The Bank Name is required for the billing information")
     * @Assert\Length(
     *      max = 100,
     *      maxMessage = "The Bank Name should not be longer than {{ limit }} characters"
     * )
     * @JMS\SerializedName("BankName")
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