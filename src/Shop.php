<?php

namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Kernel\ImdadaClient;

class Shop
{

    public function add($params)
    {
        $uri = config('easyimdada.uri.shop.add');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function update($params)
    {
        $uri = config('easyimdada.uri.shop.update');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function detail($origin_shop_id)
    {
        $arr = [
            "origin_shop_id" => $origin_shop_id
        ];
        $uri = config('easyimdada.uri.shop.detail');
        $params = json_encode($arr);
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }
}