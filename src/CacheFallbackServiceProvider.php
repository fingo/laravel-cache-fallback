<?php

namespace Fingo\LaravelCacheFallback;

use Illuminate\Cache\CacheServiceProvider;
use Illuminate\Cache\MemcachedConnector;
use Illuminate\Cache\Console\ClearCommand;

class CacheFallbackServiceProvider extends CacheServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/cache_fallback.php' => config_path('cache_fallback.php'),
        ]);
    }

    /**
     * Register the cache related console commands.
     *
     * @return void
     */
    public function registerCommands()
    {
        $this->app->singleton('command.cache.clear', function ($app) {
            return new ClearCommand($app['cache'], $app['files']);
        });
        $this->commands('command.cache.clear');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/cache_fallback.php', 'cache_fallback');
        $this->app->singleton('cache', function ($app) {
            return new CacheFallback($app);
        });

        $this->app->singleton('cache.store', function ($app) {
            return $app['cache']->driver();
        });

        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector;
        });

        $this->registerCommands();
    }


}
