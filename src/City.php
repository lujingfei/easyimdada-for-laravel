<?php
namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Kernel\DataRequestClient;
use Geoff\EasyImdada\Data\UriConfig;

class City{
    public function list(){
        $uri = UriConfig::CITY_ORDER_URI;
        $params = '';
        $dada_client = new DataRequestClient($uri, $params);
        return $dada_client->makeRequest();
    }
}