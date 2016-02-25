<?php

namespace Test;

use Fingo\LaravelCacheFallback\CacheFallback;
use Fingo\LaravelCacheFallback\CacheFallbackServiceProvider;
use Mockery;
use Orchestra\Testbench\TestCase;

class CacheFallbackTest extends TestCase
{

    protected $application;

    public function setUp()
    {
        parent::setUp();
        $this->application = $this->createApplication();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('cache.default', 'redis');
        $app['config']->set('app.key', 'hh8oYDaXmHZQ6uNhaq7HWtpDDucMtD5C');
    }

    protected function getPackageProviders($app)
    {
        return [CacheFallbackServiceProvider::class];
    }

    public function testRedisStore()
    {
        $mock = Mockery::mock('overload:Predis\Client');
        $mock->shouldReceive('ping')->andReturn(true);
        $cache = new CacheFallback($this->application);
        $this->assertInstanceOf('Illuminate\Cache\RedisStore', $cache->driver()->getStore());
    }

    public function testMemcacheStore()
    {
        $this->createFailRedis();
        $this->createSuccessMemcached();
        $cache = new CacheFallback($this->application);
        $this->assertInstanceOf('Illuminate\Cache\MemcachedStore', $cache->driver()->getStore());
    }

    public function testFileStore()
    {
        $this->createFailRedis();
        $this->createFailMemcached();
        $this->createFailDb();
        $cache = new CacheFallback($this->application);
        $this->assertInstanceOf('Illuminate\Cache\FileStore', $cache->driver()->getStore());
    }

    private function createSuccessMemcached()
    {
        $mockMemcached = Mockery::mock('overload:Illuminate\Cache\MemcachedConnector');
        $mockMemcached->shouldReceive('connect')->andReturn(true);
    }

    private function createFailMemcached()
    {
        $mockMemcached = Mockery::mock('overload:Illuminate\Cache\MemcachedConnector');
        $mockMemcached->shouldReceive('connect')->andThrow('Exception');
    }

    private function createFailRedis()
    {
        $mockRedis = Mockery::mock('overload:Predis\Client');
        $mockRedis->shouldReceive('ping')->andThrow('Exception');
    }

    private function createFailDb()
    {
        \DB::shouldReceive('connection')->andThrow('Exception');
    }
}
