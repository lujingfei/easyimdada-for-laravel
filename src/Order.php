<?php
namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Data\UriConfig;
use Geoff\EasyImdada\Kernel\DataRequestClient;

class Order{

    public function addOrder($params){
        $uri = UriConfig::ORDER_ADD_URI;
        $dada_client = new DataRequestClient($uri, $params);
        $resp = $dada_client->makeRequest();
        return json_encode($resp);
    }

    public function reAddOrder($params){
        $uri = UriConfig::ORDER_ADD_URI;
        $dada_client = new DataRequestClient($uri, $params);
        $resp = $dada_client->makeRequest();
        return json_encode($resp);
    }
}