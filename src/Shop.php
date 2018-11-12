<?php

namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Data\UriConfig;
use Geoff\EasyImdada\Kernel\DataRequestClient;

class Shop
{

    public function add($params)
    {
        $uri = UriConfig::SHOP_ADD_URI;
        $dada_client = new DataRequestClient($uri, $params);
        return $dada_client->makeRequest();
    }

    public function update($params)
    {
        $uri = UriConfig::SHOP_UPDATE_URI;
        $dada_client = new DataRequestClient($uri, $params);
        return $dada_client->makeRequest();
    }

    public function detail($origin_shop_id)
    {
        $uri = '/api/shop/detail';
        $parms = '{"origin_shop_id":"' . $origin_shop_id . '"}';
        $dada_client = new DataRequestClient($uri, $parms);
        return $dada_client->makeRequest();
    }
}