<?php
namespace Geoff\EasyImdada;

use Geoff\EasyImdada\Kernel\ImdadaClient;

class City{
    public function list(){
        $uri = config('easyimdada.uri.city.list');
        $params = '';
        $client = new ImdadaClient($uri, $params);
        return $client->request();
    }
}