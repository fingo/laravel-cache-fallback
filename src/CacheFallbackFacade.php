<?php

namespace Fingo\LaravelCacheFallback;

use Illuminate\Support\Facades\Facade;

/**
 * Class CacheFallbackFacade
 * @package Fingo\LaravelCacheFallback
 */
class CacheFallbackFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-cache-fallback';
    }
}