<?php
return [
    /**
     * 达达开发者app_key
     */
    'app_key' => env('IMDADA_APP_KEY', ''),

    /**
     * 达达开发者app_secret
     */
    'app_secret' => env('IMDADA_APP_SECRET', ''),

    /**
     * api版本
     */
     'v' => env('IMDADA_VERSION',"1.0"),

    /**
     * 数据格式
     */
     'format' => env('IMDADA_FORMAT', 'json'),

    /**
     * 商户ID
     */
    'source_id' => env('IMDADA_SOURCE_ID', '73753'),

    /**
     * host
     */
    'host' => env('IMDADA_HOST', 'http://newopen.qa.imdada.cn'),

    'uri' => [
        'city' =>[
            'list' => '/api/cityCode/list'
        ],
        'shop' =>[
            'add' => '/api/shop/add',
            'update' => '/api/shop/update',
            'detail' => '/api/shop/detail'
        ],
        'order' => [
            'addOrder' => '/api/order/addOrder',
            'reAddOrder' => '/api/order/reAddOrder',
            'accept' => '/api/order/accept',
            'fetch' => '/api/order/fetch',
            'finish' => '/api/order/finish',
        ],
    ],

    'notify_url' => env('IMDADA_NOTIFY_URL',''),
];