<?php

namespace NTI\PaylianceBundle\Services\ACH;

use GuzzleHttp\Psr7\Response;
use NTI\PaylianceBundle\Exception\InvalidRequestFormatException;
use NTI\PaylianceBundle\Exception\RequestException;
use NTI\PaylianceBundle\Models\ACH\PLACHAccount;
use NTI\PaylianceBundle\Services\PLRequestService;

/**
 * Class PLACHAccountService
 * @package NTI\PaylianceBundle\Services\ACH
 */
class PLACHAccountService extends PLRequestService {

    // Endpoints CraueConfigBundle configuration keys
    const GET_URL_KEY = "payliance.api.url.ach_account.get";
    const GET_ALL_URL_KEY = "payliance.api.url.ach_account.getAll";
    const CREATE_URL_KEY = "payliance.api.url.ach_account.create";
    const UPDATE_URL_KEY = "payliance.api.url.ach_account.update";
    const REMOVE_URL_KEY = "payliance.api.url.ach_account.remove";

    /**
     * Get the ACH Account Profile
     *
     * @param $accountId
     * @return PLACHAccount
     * @throws RequestException
     */
    public function getAccount($accountId) {
        $url = $this->container->get('craue_config')->get(self::GET_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $accountId));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while getting the ACH profile.";
            throw new RequestException($message);
        }

        /** @var PLACHAccount $account */
        $account = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLACHAccount::class, 'json');

        return $account;
    }

    /**
     * Create a new ACH Account Profile
     *
     * @param $data
     * @return PLACHAccount
     * @throws RequestException
     * @throws InvalidRequestFormatException
     */
    public function createAccount($customerProfileId, $data) {

        /** @var PLACHAccount $account */
        $account = $this->container->get('jms_serializer')->deserialize(json_encode($data), PLACHAccount::class, 'json');
        $account->setCustomerId($customerProfileId);

        $validator = $this->container->get('validator');
        $errors = $validator->validate($account);
        if(count($errors) > 0) {
            throw new InvalidRequestFormatException($errors);
        }

        $data = json_decode($this->container->get('jms_serializer')->serialize($account, 'json'), true);

        $url = $this->container->get('craue_config')->get(self::CREATE_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $data));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while creating the ACH profile.";
            throw new RequestException($message);
        }

        /** @var PLACHAccount $ACHAccount */
        $ACHAccount = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLACHAccount::class, 'json');

        return $ACHAccount;
    }

    /**
     * Updates an ACH Account
     *
     * @param PLACHAccount $ACHAccount
     * @return PLACHAccount
     * @throws RequestException
     * @throws InvalidRequestFormatException
     */
    public function updateAccount($accountId, $data) {

        /** @var PLACHAccount $account */
        $account = $this->container->get('jms_serializer')->deserialize(json_encode($data), PLACHAccount::class, 'json');
        $account->setId($accountId);

        $validator = $this->container->get('validator');
        $errors = $validator->validate($account);
        if(count($errors) > 0) {
            throw new InvalidRequestFormatException($errors);
        }

        $data = json_decode($this->container->get('jms_serializer')->serialize($account, 'json'), true);

        $url = $this->container->get('craue_config')->get(self::UPDATE_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $data));
        $content = json_decode($response->getBody()->getContents(), true);

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while updating the ACH profile.";
            throw new RequestException($message);
        }

        /** @var PLACHAccount $ACHAccount */
        $ACHAccount = $this->container->get('jms_serializer')->deserialize(json_encode($content["Response"]), PLACHAccount::class, 'json');

        return $ACHAccount;
    }

    /**
     * Removes an ACH Account Profile
     *
     * @param $accountId
     * @return bool
     * @throws RequestException
     */
    public function removeAccount($accountId) {
        $url = $this->container->get('craue_config')->get(self::REMOVE_URL_KEY);

        /** @var Response $response */
        $response = $this->post($url, array("Request" => $accountId));
        $content = json_decode($response->getBody()->getContents(), true);
        $responseData = $content["Response"];

        // Validate the response
        if(isset($content["Success"]) && !$content["Success"]) {
            $message = (isset($content["Message"])) ? $content["Message"] : "An unknown error occurred while removing the ACH profile.";
            throw new RequestException($message);
        }

        return $responseData;
    }

}