<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=tsdev',
            'username' => 'tsdev',
            'password' => 'ts28',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'bootstrap'=>'gii',
    'modules'=>[
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs'=>['127.0.0.1', '::1', '192.168.*.*'],
            'generators' => [
                'doubleModel' => [
                    'class' => 'claudejanz\mygii\generators\model\Generator',
                ],
            ],
        ],
        'crm' => [
            'class' => 'common\modules\crm\Crm',
        ],
    ],
];
