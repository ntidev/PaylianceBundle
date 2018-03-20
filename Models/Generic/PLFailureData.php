<?php

namespace NTI\PaylianceBundle\Models\Generic;

use JMS\Serializer\Annotation as JMS;

class PLFailureData
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Code;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $Description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $MerchantActionText;

    /**
     * @var boolean
     * @JMS\Type("boolean")
     */
    private $IsDecline;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * @param string $Code
     * @return PLFailureData
     */
    public function setCode($Code)
    {
        $this->Code = $Code;
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
     * @return PLFailureData
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantActionText()
    {
        return $this->MerchantActionText;
    }

    /**
     * @param string $MerchantActionText
     * @return PLFailureData
     */
    public function setMerchantActionText($MerchantActionText)
    {
        $this->MerchantActionText = $MerchantActionText;
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
     * @return PLFailureData
     */
    public function setIsDecline($IsDecline)
    {
        $this->IsDecline = $IsDecline;
        return $this;
    }


}