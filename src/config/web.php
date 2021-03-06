<?php
$config = array_merge_recursive(require(__DIR__ . '/common.php'), [
    'id'                  => 'neroblu-web',
    'controllerNamespace' => 'app\controllers',
    'components'          => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lwq0RvztGJFhFz9-uoO3buZk1j_AhW8Y',
        ],
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => require(__DIR__ . '/routes.php'),
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'loginUrl'        => ['/sign-in'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'default/error',
        ],
    ],
    'modules'             => [
        // API
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
]);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
