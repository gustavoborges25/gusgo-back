<?php

namespace Modules\Control\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IRSService
{
    private $irsUrl;

    private $clientGuzzle;

    /**
     * Create a new IRSService instance.
     */
    public function __construct()
    {
        $this->irsUrl = config('external.receita_ws');
        $this->clientGuzzle = new Client(['base_uri' => $this->irsUrl]);
    }

    public function getData($cnpj)
    {
        try {
        	$answerIRS = $this->clientGuzzle->request('GET', 'cnpj/'.$cnpj);
        } catch (RequestException  $e) {
        	return false;
        }

        $data = json_decode($answerIRS->getBody()->getContents());
        return $data;
    }
}
