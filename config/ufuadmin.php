<?php

/*
 * This file is part of the ufucms/ufuadmin.
 *
 * (c) ufucms <ufucms@ufucms.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return [
    'title' => env('UFUADMIN_TITLE', 'ufuadmin'),
    'desc' => env('UFUADMIN_DESC', 'ufuadmin 是 强 大 易 用 的 后 台 系 统 之 一'),

    'guard' => env('UFUADMIN_GUARD', 'admin'),

    'routes' => [
        'web' => [
            'prefix' => env('UFUADMIN_WEB_PREFIX', 'ufuadmin'),
            'middleware' => ['web', 'admin'],
        ],
        'api' => [
            'prefix' => env('UFUADMIN_API_PREFIX', 'api'),
            'middleware' => ['web'],
        ],
    ],

    'auth' => [
        'guards' => [
            'admin' => [
                'driver' => 'session',
                'provider' => 'users',
            ],
        ],
    ],

    'https' => env('UFUADMIN_HTTPS', false),

    'cache' => [
        'enable' => env('UFUADMIN_CACHE_ENABLE', true),
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'key' => 'ufuadmin:config',
        'store' => 'default',
    ],

    // layui 组件全局配置
    'table' => [
        'parseData' => '(function(res){return {code:res.code,msg:res.message,count:res.data.meta.pagination.total,data:res.data.list}})',
        'response' => [
            'statusName' => 'code',
            'statusCode' => 200,
        ],
        'defaultToolbar' => [
            ['layEvent' => 'refresh', 'icon' => 'layui-icon-refresh'],
            'filter',
            'print',
            'exports',
        ],
        'page' => true,
        'skin' => 'line',
        'even' => true,
    ],

    'select' => [
        'response' => [
            'statusCode' => 200,
            'statusName' => 'code',
            'msgName' => 'message',
            'dataName' => 'data',
        ],
    ],
];
