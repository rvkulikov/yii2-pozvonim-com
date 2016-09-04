<?php
$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id'         => 'testApp',
    'basePath'   => __DIR__,
    'vendorPath' => __DIR__ . '/../../vendor',
    'aliases'    => [
        '@web'     => '/',
        '@webroot' => __DIR__ . '/app',
        '@vendor'  => __DIR__ . '/../../vendor',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'params'     => $params
];