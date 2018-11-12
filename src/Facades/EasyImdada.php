<?php
namespace Geoff\EasyImdada\Facades;

use Illuminate\Support\Facades\Facade;

class EasyImdada extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'easyimdada';
    }
}