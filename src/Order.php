<?php
namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Data\UriConfig;
use Geoff\EasyImdada\Kernel\DataRequestClient;

class Order{

    public function addOrder($params){
        $uri = UriConfig::ORDER_ADD_URI;
        $dada_client = new DataRequestClient($uri, $params);
        return $dada_client->makeRequest();
    }

    public function reAddOrder($params){
        $uri = UriConfig::ORDER_ADD_URI;
        $dada_client = new DataRequestClient($uri, $params);
        return $dada_client->makeRequest();
    }
}