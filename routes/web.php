<?php

/*
 * This file is part of the ufucms/ufuadmin.
 *
 * (c) ufucms <ufucms@ufucms.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Support\Facades\Route;
use Ufucms\Ufuadmin\Support\Facades\Ufuadmin;

// 无需授权的页面
Route::get('/login', Ufuadmin::view())->middleware('guest:'.config('ufuadmin.guard')); // 登录

// 需授权的页面
Route::middleware('auth:'.config('ufuadmin.guard'))->group(function () {
    Route::get('/{path}', Ufuadmin::view())->where('path', '.+'); // 核心路由
});
