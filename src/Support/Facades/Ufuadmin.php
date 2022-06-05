<?php

/*
 * This file is part of the ufucms/ufuadmin.
 *
 * (c) ufucms <ufucms@ufucms.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ufucms\Ufuadmin\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string version()
 * @method static bool isAdminRoute(string $path)
 * @method static array bootstrap()
 * @method static array getPageConfig(string|null $path = null)
 * @method static \Closure view()
 *
 * @see \Ufucms\Ufuadmin\Ufuadmin
 */
class Ufuadmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ufuadmin';
    }
}
