<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'exchange_rates' => [
            'class' => 'common\components\ExchangeRates',
            'source' => 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5',
            'currency' => [
                'USD',
                'UAH',
            ],
        ],
    ],
    
];
