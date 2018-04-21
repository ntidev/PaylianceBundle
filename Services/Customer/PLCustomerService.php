<?php

namespace NTI\PaylianceBundle\Services\Customer;

use GuzzleHttp\Psr7\Response;
use NTI\PaylianceBundle\Exception\RequestException;
use NTI\PaylianceBundle\Models\ACH\PLACHAccount;
use NTI\PaylianceBundle\Models\Customer\PLCustomer;
use NTI\PaylianceBundle\Services\PLRequestService;

class PLCustomerService extends PLRequestService {

    // SortBy codes shown in the API Documentation
    const SORTBY_FIRSTNAME = "0";
    const SORTBY_MIDDLENAME = "1";
    const SORTBY_LASTNAME = "2";
    const SORTBY_COMPANY = "3";
    const SORTBY_BILLINGADDRESSCITY = "4";
    const SORTBY_BILLINGADDRESSSTATE = "5";
    const SORTBY_BILLINGADDRESSZIP = "6";
    const SORTBY_BILLINGADDRESSCOUNTRY = "7";
    const SORTBY_SHIPPINGADDRESSCITY = "8";
    const SORTBY_SHIPPINGADDRESSSTATE = "9";
    const SORTBY_SHIPPINGADDRESSZIP = "10";
    const SORTBY_SHIPPINGADDRESSCOUNTRY = "11";

    // Endpoints CraueConfigBundle configuration keys
    const GET_URL_KEY = "payliance.api.url.customer.get";
    const GET_ALL_URL_KEY = "payliance.api.url.customer.get_all";
    const CREATE_URL_KEY = "payliance.api.url.customer.create";
    const UPDATE_URL_KEY = "payliance.api.url.customer.update";
    const ACH_ACCOUNTS_URL_KEY = "payliance.api.url.customer.ach_accounts";
    const ACH_ACCOUNT_SET_DEFAULT_URL_KEY = "payliance.api.url.customer.ach_account.set_default";


    /**
     * Gets a list of PLCustomer Profiles
     *
     * @param $options
     * @return array
     * @throws RequestException
     */
    public function getAll($options = array()) {

        // Defaults
        $options = array(
            "SortBy" => (isset($options["SortBy"])) ? $options["SortBy"] : self::SORTBY_FIRSTNAME,
            "Direction" => (isset($options["Direction"])) ? $options["Direction"] : self::DIRECTION_ASC,
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
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while getting the PLCustomer Profile for ACH.";
            throw new RequestException($message);
        }

        // Deserialize the Customers
        $customers = $this->container->get('jms_serializer')->deserialize(json_encode($responseData["Items"]),'array<'.PLCustomer::class.'>' , 'json');

        return array(
            "Page" => $responseData["Page"],
            "ItemsPerPage" => $responseData["ItemsPerPage"],
            "TotalItems" => $responseData["TotalItems"],
            "TotalPages" => $responseData["TotalPages"],
            "Items" => $customers,
        );
    }

    /**
     * Gets a PLCustomer Profile
     *
     * @param $customerId
     * @return PLCustomer
     * @throws RequestException
     */
    public function getProfile($customerId) {
        $url = $this->container->get('craue_config')->get(self::GET_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $customerId));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while getting the PLCustomer Profile for ACH.";
            throw new RequestException($message);
        }

        /** @var PLCustomer $customer */
        $customer = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLCustomer::class, 'json');

        // Get the ACHAccounts
        $achAccounts = $this->getACHAccounts($customerId);
        $customer->setPaymentProfiles($achAccounts);

        return $customer;
    }

    /**
     * Creates a new PLCustomer Profile
     *
     * @param $data
     * @return PLCustomer
     * @throws RequestException
     */
    public function createProfile($data) {

        if($data instanceof PLCustomer) {
            $data = json_decode($this->container->get('jms_serializer')->serialize($data, 'json'), true);
        }

        $url = $this->container->get('craue_config')->get(self::CREATE_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $data));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while creating the PLCustomer Profile for ACH.";
            throw new RequestException($message);
        }

        /** @var PLCustomer $customer */
        $customer = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLCustomer::class, 'json');

        // Todo: Validate before creating customer profile
        if(isset($data["payment_profiles"])) {
            foreach($data["payment_profiles"] as $paymentProfile) {
                $this->container->get('nti.payliance.ach_account')->create($customer->getId(), $paymentProfile);
            }
        }

        return $customer;
    }

    /**
     * Updates a PLCustomer Profile
     *
     * @param PLCustomer $customer
     * @return PLCustomer
     * @throws RequestException
     */
    public function updateProfile(PLCustomer $customer) {
        $url = $this->container->get('craue_config')->get(self::UPDATE_URL_KEY);

        $data = json_decode($this->container->get('jms_serializer')->serialize($customer, 'json'), true);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $data));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while updating the PLCustomer Profile for ACH.";
            throw new RequestException($message);
        }

        /** @var PLCustomer $customer */
        $customer = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLCustomer::class, 'json');

        return $customer;
    }

    /**
     * Gets the list of ACH Accounts for a PLCustomer
     *
     * @param $customerId
     * @return PLCustomer
     * @throws RequestException
     */
    public function getAccounts($customerId) {
        $url = $this->container->get('craue_config')->get(self::ACH_ACCOUNTS_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $customerId));
        $content = json_decode($response->getBody()->getContents(), true);
        $responseData = $content["Response"];

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while getting the list of ACH Accounts for the PLCustomer";
            throw new RequestException($message);
        }

        $ACHAccounts = $this->container->get('jms_serializer')->deserialize(json_encode($responseData),'array<'.PLACHAccount::class.'>' , 'json');

        return $ACHAccounts;
    }

    /**
     * Set the Default ACH Account for a PLCustomer
     *
     * @param $customerId
     * @param $ACHAccountId
     * @return PLCustomer
     * @throws RequestException
     */
    public function setDefaultAccount($customerId, $ACHAccountId) {
        $url = $this->container->get('craue_config')->get(self::ACH_ACCOUNT_SET_DEFAULT_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array(
            "CustomerId" => $customerId,
            "AccountId" => $ACHAccountId
        ));
        $content = json_decode($response->getBody()->getContents(), true);
        $responseData = $content["Response"];

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while setting the default ACH profile for the PLCustomer.";
            throw new RequestException($message);
        }

        return $responseData;
    }


}
