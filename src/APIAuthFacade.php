<?php

namespace TienEnjoywork\APIAuth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TienEnjoywork\APIAuth\Skeleton\SkeletonClass
 */
class APIAuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'apiauth';
    }
}
