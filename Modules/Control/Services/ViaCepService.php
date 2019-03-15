<?php

namespace Modules\PostoMelhor\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ViaCepService
{
    private $viaCepUrl;

    private $clientGuzzle;

    /**
     * Create a new ViaCepService instance.
     */
    public function __construct()
    {
        $this->viaCepUrl = config('external.via_cep');
        $this->clientGuzzle = new Client(['base_uri' => $this->viaCepUrl]);
    }

    public function getData($cep)
    {
        try {
            $cep = preg_replace('/[^0-9]/', '', $cep);
            $answer = $this->clientGuzzle->request('GET', $cep . '/json');

        } catch (RequestException  $e) {
            return false;
        }

        return json_decode($answer->getBody()->getContents());
    }
}
