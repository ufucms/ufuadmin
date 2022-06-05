<?php

/*
 * This file is part of the ufucms/ufuadmin.
 *
 * (c) ufucms <ufucms@ufucms.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ufucms\Ufuadmin\Http\Middleware;

use Illuminate\Http\Request;
use Ufucms\Ufuadmin\Support\Facades\Ufuadmin;

class Bootstrap
{
    public function handle(Request $request, \Closure $next)
    {
        $request->merge(['ufuadmin' => Ufuadmin::bootstrap()]);

        return $next($request);
    }
}
