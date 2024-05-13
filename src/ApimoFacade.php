<?php

namespace Ashraam\Apimo;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ashraam\Apimo\Skeleton\SkeletonClass
 */
class ApimoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'apimo';
    }
}
