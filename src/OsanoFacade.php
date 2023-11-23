<?php

namespace Astrogoat\Osano;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Osano\Osano
 */
class OsanoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'osano';
    }
}
