<?php

namespace Modules\Control\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IbgeService
{
    private $baseUrl;
    private $clientGuzzle;

    /**
     * Create a new ViaCepService instance.
     */
    public function __construct()
    {
        $this->baseUrl = 'http://servicodados.ibge.gov.br/api/v1/localidades/estados';
        $this->clientGuzzle = new Client();
    }

    public function getCities($stateId)
    {
        try {
            $response = $this->clientGuzzle->request('GET', $this->baseUrl . '/' . $stateId . '/municipios');
        } catch (RequestException  $e) {
            return false;
        }

        return json_decode($response->getBody()->getContents());
    }
    public function getStates()
    {
        try {
            $response = $this->clientGuzzle->request('GET', $this->baseUrl);
        } catch (RequestException  $e) {
            return false;
        }

        return json_decode($response->getBody()->getContents());
    }
}
