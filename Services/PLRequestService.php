<?php

namespace Payliance\ApiBundle\Services;

use GuzzleHttp\Exception\ConnectException;
use Payliance\ApiBundle\Exception\RequestException;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class RequestService
 * @package NTI\PaylianceBundle\Services
 */
class PLRequestService {

    // Sorting options
    const DIRECTION_ASC = "0";
    const DIRECTION_DESC = "1";

    // Endpoints CraueConfigBundle configuration keys
    const BASE_URL_KEY = "payliance.api.url";
    const API_USER_KEY = "payliance.api.user";
    const API_KEY_KEY = "payliance.api.key";

    /** @var ContainerInterface $container */
    protected $container;

    /**
     * RequestService constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    /**
     * POST to NTI
     *
     * @param $url
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws RequestException
     */
    public function post($url, $data) {

        // GuzzleHttp Client
        $client = new \GuzzleHttp\Client(array('base_uri' => $this->container->get('craue_config')->get(self::BASE_URL_KEY)));

        // Parameters
        // The Auth portion is always sent with the authentication information
        $params = array_merge($data, array(
            "Auth" => array(
                "UserName" => $this->container->get('craue_config')->get(self::API_USER_KEY),
                "SecretAccessKey" => $this->container->get('craue_config')->get(self::API_KEY_KEY),
            )
        ));

        // Send the request
        try {
            $response = $client->request('POST', $url, array(
                "form_params" => $params
            ));
        } catch (ConnectException $ex) {
            if($this->container->has('nti.logger')) {
                $this->container->get('nti.logger')->logException($ex);
            }
            throw new RequestException("Unable to complete the request. Please contact support at help@greenlinknetworks.com if the problem persists.");
        }

        // Return the response
        return $response;

    }

}