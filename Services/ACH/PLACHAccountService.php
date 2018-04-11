<?php

namespace NTI\PaylianceBundle\Services\ACH;

use GuzzleHttp\Psr7\Response;
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
     * Gets an ACH Account Profile in NTI
     *
     * @param $accountId
     * @return PLACHAccount
     * @throws RequestException
     */
    public function get($accountId) {
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
     * Create a new ACH Account Profile in NTI
     *
     * @param $data
     * @return PLACHAccount
     * @throws RequestException
     */
    public function create($data) {

        if($data instanceof PLACHAccount) {
            $data = json_decode($this->container->get('jms_serializer')->serialize($data, 'json'), true);
        }

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
     * Updates an ACH Account NTI
     *
     * @param PLACHAccount $ACHAccount
     * @return PLACHAccount
     * @throws RequestException
     */
    public function update($accountId, $data) {
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
     * Removes an ACH Account Profile in NTI
     *
     * @param $accountId
     * @return bool
     * @throws RequestException
     */
    public function remove($accountId) {
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