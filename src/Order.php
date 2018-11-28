<?php

namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Kernel\ImdadaClient;

class Order
{

    public function addOrder($params)
    {
        $uri = config('easyimdada.uri.order.addOrder');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function reAddOrder($params)
    {
        $uri = config('easyimdada.uri.order.reAddOrder');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function query($order_id)
    {
        $params_array = ['order_id' => $order_id];
        $params = json_encode($params_array);
        $uri = config('easyimdada.uri.order.query');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function accept($order_id)
    {
        $params_array = ['order_id' => $order_id];
        $params = json_encode($params_array);
        $uri = config('easyimdada.uri.order.accept');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function fetch($order_id)
    {
        $params_array = ['order_id' => $order_id];
        $params = json_encode($params_array);
        $uri = config('easyimdada.uri.order.fetch');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }

    public function finish($order_id)
    {
        $params_array = ['order_id' => $order_id];
        $params = json_encode($params_array);
        $uri = config('easyimdada.uri.order.finish');
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }
}