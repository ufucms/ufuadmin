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

// 无需授权的接口

// 需授权的接口
Route::middleware('auth:'.config('ufuadmin.guard'))->group(function () {
});
