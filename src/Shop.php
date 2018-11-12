<?php
namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Data\UriConfig;
use Geoff\EasyImdada\Kernel\DataRequestClient;

class Shop{

    public function add($params){
        $uri = UriConfig::SHOP_ADD_URI;
        $dada_client = new DataRequestClient($uri, $params);
        $resp = $dada_client->makeRequest();
        return json_encode($resp);
    }

    public function update($params){
        $uri = UriConfig::SHOP_UPDATE_URI;
        $dada_client = new DataRequestClient($uri, $params);
        $resp = $dada_client->makeRequest();
        return json_encode($resp);
    }
}