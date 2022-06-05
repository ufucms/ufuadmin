<?php

/*
 * This file is part of the ufucms/ufuadmin.
 *
 * (c) ufucms <ufucms@ufucms.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ufucms\Ufuadmin\Exceptions;

class InvalidPageConfigException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 403);
    }
}
