<?php

namespace Payliance\ApiBundle\Models\Payment;

use JMS\Serializer\Annotation as JMS;
use Payliance\ApiBundle\Models\Generic\PLFailureData;

/**
 * Class PLPayment
 * @package NTI\PaylianceBundle\Models\Payment
 */
class PLPayment
{
    // PaymentSubType
    const PAYMENT_SUB_TYPE_CCD = "0";
    const PAYMENT_SUB_TYPE_PPD = "2";
    const PAYMENT_SUB_TYPE_TEL = "4";
    const PAYMENT_SUB_TYPE_WEB = "5";

    // Status
    const PAYMENT_STATUS_PENDING = "0";
    const PAYMENT_STATUS_FAILED = "2";
    const PAYMENT_STATUS_POSTED = "4";
    const PAYMENT_STATUS_REFUND_SETTLED = "5";
    const PAYMENT_STATUS_REFUNDED = "7";
    const PAYMENT_STATUS_SETTLED = "9";
    const PAYMENT_STATUS_VOIDED = "11";
    const PAYMENT_STATUS_REVERSENSF_RETURNEDNSF = "15";


    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $Id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $AccountId;

    /**
     * @var float
     * @JMS\Type("float")
     */
    private $Amount;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $IsDebit;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Cvv;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $PaymentSubType;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $InvoiceId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $InvoiceNumber;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $PurchaseOrderNumber;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $OrderId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Latitude;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Longitude;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $SuccessReceiptOptions;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $FailureReceiptOptions;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $CustomerId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $CustomerFirstName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $CustomerLastName;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $CustomerCompany;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $ReferenceId;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Status;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $RecurringScheduleId;

    /**
     * @var integer
     * @JMS\Type("integer")
     */
    private $PaymentType;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $ProviderAuthCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $TraceNumber;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $PaymentDate;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $ReturnDate;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $EstimatedSettleDate;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $ActualSettleDate;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $CanVoidUntil;

    /**
     * @var PLFailureData
     * @JMS\Type("NTI\PaylianceBundle\Models\Generic\PLFailureData")
     */
    private $FailureData;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $IsDecline;

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
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $RequiresReceipt;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $PaymentToken;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return PLPayment
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->AccountId;
    }

    /**
     * @param string $AccountId
     * @return PLPayment
     */
    public function setAccountId($AccountId)
    {
        $this->AccountId = $AccountId;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param float $Amount
     * @return PLPayment
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDebit()
    {
        return $this->IsDebit;
    }

    /**
     * @param bool $IsDebit
     * @return PLPayment
     */
    public function setIsDebit($IsDebit)
    {
        $this->IsDebit = $IsDebit;
        return $this;
    }

    /**
     * @return string
     */
    public function getCvv()
    {
        return $this->Cvv;
    }

    /**
     * @param string $Cvv
     * @return PLPayment
     */
    public function setCvv($Cvv)
    {
        $this->Cvv = $Cvv;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentSubType()
    {
        return $this->PaymentSubType;
    }

    /**
     * @param int $PaymentSubType
     * @return PLPayment
     */
    public function setPaymentSubType($PaymentSubType)
    {
        $this->PaymentSubType = $PaymentSubType;
        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceId()
    {
        return $this->InvoiceId;
    }

    /**
     * @param int $InvoiceId
     * @return PLPayment
     */
    public function setInvoiceId($InvoiceId)
    {
        $this->InvoiceId = $InvoiceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->InvoiceNumber;
    }

    /**
     * @param string $InvoiceNumber
     * @return PLPayment
     */
    public function setInvoiceNumber($InvoiceNumber)
    {
        $this->InvoiceNumber = $InvoiceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->PurchaseOrderNumber;
    }

    /**
     * @param string $PurchaseOrderNumber
     * @return PLPayment
     */
    public function setPurchaseOrderNumber($PurchaseOrderNumber)
    {
        $this->PurchaseOrderNumber = $PurchaseOrderNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->OrderId;
    }

    /**
     * @param int $OrderId
     * @return PLPayment
     */
    public function setOrderId($OrderId)
    {
        $this->OrderId = $OrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     * @return PLPayment
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->Latitude;
    }

    /**
     * @param string $Latitude
     * @return PLPayment
     */
    public function setLatitude($Latitude)
    {
        $this->Latitude = $Latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->Longitude;
    }

    /**
     * @param string $Longitude
     * @return PLPayment
     */
    public function setLongitude($Longitude)
    {
        $this->Longitude = $Longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuccessReceiptOptions()
    {
        return $this->SuccessReceiptOptions;
    }

    /**
     * @param string $SuccessReceiptOptions
     * @return PLPayment
     */
    public function setSuccessReceiptOptions($SuccessReceiptOptions)
    {
        $this->SuccessReceiptOptions = $SuccessReceiptOptions;
        return $this;
    }

    /**
     * @return string
     */
    public function getFailureReceiptOptions()
    {
        return $this->FailureReceiptOptions;
    }

    /**
     * @param string $FailureReceiptOptions
     * @return PLPayment
     */
    public function setFailureReceiptOptions($FailureReceiptOptions)
    {
        $this->FailureReceiptOptions = $FailureReceiptOptions;
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
     * @return PLPayment
     */
    public function setCustomerId($CustomerId)
    {
        $this->CustomerId = $CustomerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerFirstName()
    {
        return $this->CustomerFirstName;
    }

    /**
     * @param string $CustomerFirstName
     * @return PLPayment
     */
    public function setCustomerFirstName($CustomerFirstName)
    {
        $this->CustomerFirstName = $CustomerFirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerLastName()
    {
        return $this->CustomerLastName;
    }

    /**
     * @param string $CustomerLastName
     * @return PLPayment
     */
    public function setCustomerLastName($CustomerLastName)
    {
        $this->CustomerLastName = $CustomerLastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCompany()
    {
        return $this->CustomerCompany;
    }

    /**
     * @param string $CustomerCompany
     * @return PLPayment
     */
    public function setCustomerCompany($CustomerCompany)
    {
        $this->CustomerCompany = $CustomerCompany;
        return $this;
    }

    /**
     * @return int
     */
    public function getReferenceId()
    {
        return $this->ReferenceId;
    }

    /**
     * @param int $ReferenceId
     * @return PLPayment
     */
    public function setReferenceId($ReferenceId)
    {
        $this->ReferenceId = $ReferenceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     * @return PLPayment
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * @return int
     */
    public function getRecurringScheduleId()
    {
        return $this->RecurringScheduleId;
    }

    /**
     * @param int $RecurringScheduleId
     * @return PLPayment
     */
    public function setRecurringScheduleId($RecurringScheduleId)
    {
        $this->RecurringScheduleId = $RecurringScheduleId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentType()
    {
        return $this->PaymentType;
    }

    /**
     * @param int $PaymentType
     * @return PLPayment
     */
    public function setPaymentType($PaymentType)
    {
        $this->PaymentType = $PaymentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderAuthCode()
    {
        return $this->ProviderAuthCode;
    }

    /**
     * @param string $ProviderAuthCode
     * @return PLPayment
     */
    public function setProviderAuthCode($ProviderAuthCode)
    {
        $this->ProviderAuthCode = $ProviderAuthCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTraceNumber()
    {
        return $this->TraceNumber;
    }

    /**
     * @param string $TraceNumber
     * @return PLPayment
     */
    public function setTraceNumber($TraceNumber)
    {
        $this->TraceNumber = $TraceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->PaymentDate;
    }

    /**
     * @param string $PaymentDate
     * @return PLPayment
     */
    public function setPaymentDate($PaymentDate)
    {
        $this->PaymentDate = $PaymentDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnDate()
    {
        return $this->ReturnDate;
    }

    /**
     * @param string $ReturnDate
     * @return PLPayment
     */
    public function setReturnDate($ReturnDate)
    {
        $this->ReturnDate = $ReturnDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstimatedSettleDate()
    {
        return $this->EstimatedSettleDate;
    }

    /**
     * @param string $EstimatedSettleDate
     * @return PLPayment
     */
    public function setEstimatedSettleDate($EstimatedSettleDate)
    {
        $this->EstimatedSettleDate = $EstimatedSettleDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getActualSettleDate()
    {
        return $this->ActualSettleDate;
    }

    /**
     * @param string $ActualSettleDate
     * @return PLPayment
     */
    public function setActualSettleDate($ActualSettleDate)
    {
        $this->ActualSettleDate = $ActualSettleDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getCanVoidUntil()
    {
        return $this->CanVoidUntil;
    }

    /**
     * @param string $CanVoidUntil
     * @return PLPayment
     */
    public function setCanVoidUntil($CanVoidUntil)
    {
        $this->CanVoidUntil = $CanVoidUntil;
        return $this;
    }

    /**
     * @return string
     */
    public function getFailureData()
    {
        return $this->FailureData;
    }

    /**
     * @param string $FailureData
     * @return PLPayment
     */
    public function setFailureData($FailureData)
    {
        $this->FailureData = $FailureData;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDecline()
    {
        return $this->IsDecline;
    }

    /**
     * @param bool $IsDecline
     * @return PLPayment
     */
    public function setIsDecline($IsDecline)
    {
        $this->IsDecline = $IsDecline;
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
     * @return PLPayment
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
     * @return PLPayment
     */
    public function setLastModified($LastModified)
    {
        $this->LastModified = $LastModified;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequiresReceipt()
    {
        return $this->RequiresReceipt;
    }

    /**
     * @param bool $RequiresReceipt
     * @return PLPayment
     */
    public function setRequiresReceipt($RequiresReceipt)
    {
        $this->RequiresReceipt = $RequiresReceipt;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentToken()
    {
        return $this->PaymentToken;
    }

    /**
     * @param string $PaymentToken
     * @return PLPayment
     */
    public function setPaymentToken($PaymentToken)
    {
        $this->PaymentToken = $PaymentToken;
        return $this;
    }


}
