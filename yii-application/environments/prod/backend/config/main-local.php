<?php

$config = [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            // advanced_yii2 is the database name
            'dsn' => 'pgsql:host=localhost;dbname=recommendation',
            'username' => 'postgres',
            'password' => 'arts123',
            'charset' => 'utf8',
        ],
        'request' => [

            'enableCookieValidation' => true,

            'enableCsrfValidation' => true,

            'cookieValidationKey' => 'sdffs',

            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
    ],
];


return $config;
