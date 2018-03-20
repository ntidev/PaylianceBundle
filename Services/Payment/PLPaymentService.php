<?php

namespace NTI\PaylianceBundle\Services\Payment;

use GuzzleHttp\Psr7\Response;
use NTI\PaylianceBundle\Exception\RequestException;
use NTI\PaylianceBundle\Models\Payment\PLPayment;
use NTI\PaylianceBundle\Services\PLRequestService;

/**
 * Class PLPaymentService
 * @package NTI\PaylianceBundle\Services\Payment
 */
class PLPaymentService extends PLRequestService
{
    // Filters
    const STATUS_FILTER_AUTHORIZED = "0";
    const STATUS_FILTER_CHARGEBACK = "1";
    const STATUS_FILTER_FAILED = "2";
    const STATUS_FILTER_PENDING = "3";
    const STATUS_FILTER_POSTED = "4";
    const STATUS_FILTER_REFUNDSETTLED = "5";
    const STATUS_FILTER_RETURNED = "6";
    const STATUS_FILTER_REVERSED = "7";
    const STATUS_FILTER_REVERSENSF = "8";

    //Sorting
    const SORTBY_ACTUALSETTLEDDATE = "0";
    const SORTBY_AMOUNT = "1";
    const SORTBY_ESTIMATEDSETTLEDDATE = "2";
    const SORTBY_PAYMENTDATE = "3";
    const SORTBY_PAYMENTID = "4";
    const SORTBY_PAYMENTSUBTYPE = "5";
    const SORTBY_PAYMENTTYPE = "6";
    const SORTBY_RETURNDATE = "7";

    // Endpoints CraueConfigBundle configuration keys
    const CREATE_ONE_TIME_EXISTING_CUSTOMER_URL_KEY = "payliance.api.url.payment.create_one_time_for_existing_customer";
    const VOID_URL_KEY = "payliance.api.url.payment.void";
    const REVERSE_URL_KEY = "payliance.api.url.payment.reverse";
    const GET_URL_KEY = "payliance.api.url.payment.get";
    const GET_ALL_URL_KEY = "payliance.api.url.payment.get_all";

    /**
     * Gets a list of Payments from NTI
     *
     * @param $options
     * @return array
     * @throws RequestException
     */
    public function getAll($options = array()) {

        // Defaults
        $options = array(
            "SortBy" => (isset($options["SortBy"])) ? $options["SortBy"] : self::SORTBY_PAYMENTDATE,
            "Direction" => (isset($options["Direction"])) ? $options["Direction"] : self::DIRECTION_DESC,
            "Lite" => (isset($options["Lite"])) ? $options["Lite"] : true,
            "Page" => (isset($options["Page"]) && $options["Page"] > 0) ? $options["Page"] : 1,
            "PageSize" => (isset($options["PageSize"]) && $options["PageSize"] > 0) ? $options["PageSize"] : 20,
        );

        $url = $this->container->get('craue_config')->get(self::GET_ALL_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, $options);
        $content = json_decode($response->getBody()->getContents(), true);
        $responseData = $content["Response"];

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while getting the list of Payments.";
            throw new RequestException($message);
        }
        // Deserialize the Payments
        $payments = $this->container->get('jms_serializer')->deserialize(json_encode($responseData["Items"]),'array<'.PLPayment::class.'>' , 'json');

        return array(
            "Page" => $responseData["Page"],
            "ItemsPerPage" => $responseData["ItemsPerPage"],
            "TotalItems" => $responseData["TotalItems"],
            "TotalPages" => $responseData["TotalPages"],
            "Items" => $payments,
        );
    }


    /**
     * Gets the Payment Information
     *
     * @param $paymentId
     * @return PLPayment
     * @throws RequestException
     */
    public function get($paymentId) {
        $url = $this->container->get('craue_config')->get(self::GET_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $paymentId));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while getting the Payment information.";
            throw new RequestException($message);
        }

        /** @var PLPayment $payment */
        $payment = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLPayment::class, 'json');

        return $payment;
    }

    /**
     * Creates a One Time Payment for an existing PLCustomer
     *
     * @param $accountId
     * @param $amount
     * @param $optional
     * @return PLPayment
     * @throws RequestException
     */
    public function createOneTimeForExistingCustomer($accountId, $amount, $optional = array()) {
        $url = $this->container->get('craue_config')->get(self::CREATE_ONE_TIME_EXISTING_CUSTOMER_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => array_merge(array(
            "AccountId" => $accountId,
            "Amount" => $amount,
        ), $optional)));

        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while processing the Payment.";
            throw new RequestException($message);
        }

        /** @var PLPayment $payment */
        $payment = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLPayment::class, 'json');

        return $payment;
    }

    /**
     * Void a Payment in NTI
     *
     * @param $paymentId
     * @return PLPayment
     * @throws RequestException
     */
    public function void($paymentId) {

        $url = $this->container->get('craue_config')->get(self::VOID_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $paymentId));

        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while Voiding the Payment.";
            throw new RequestException($message);
        }

        /** @var PLPayment $payment */
        $payment = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLPayment::class, 'json');

        return $payment;
    }

    /**
     * Reverse (Refund) a Payment in NTI
     *
     * @param $paymentId
     * @return PLPayment
     * @throws RequestException
     */
    public function refund($paymentId) {

        $url = $this->container->get('craue_config')->get(self::REVERSE_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $paymentId));

        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while Reversing the Payment.";
            throw new RequestException($message);
        }

        /** @var PLPayment $payment */
        $payment = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLPayment::class, 'json');

        return $payment;
    }

}