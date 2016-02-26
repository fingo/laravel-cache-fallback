# CacheFallback

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

Package for falling back cache drivers if current is not available.

Be advised that if the last driver fails, normal laravel Error is thrown

## Usage
Comment out Illuminate Cache driver in config/app.php
``` php
//Illuminate\Cache\CacheServiceProvider::class,
```
Add fallback provider to config/app.php
``` php
Fingo\LaravelCacheFallback\CacheFallbackServiceProvider::class,
```

Default fallback order is: redis, memcache, database, cookie, file, array

If needed to change fallback order, publish vendors
 ``` bash
 php artisan vendor:publish
 ```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The Apache license Version 2.0. Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/fingo/laravel-cache-fallback.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-Apache%202.0-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/fingo/laravel-cache-fallback/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/fingo/laravel-cache-fallback.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/fingo/laravel-cache-fallback
[link-travis]: https://travis-ci.org/fingo/laravel-cache-fallback
[link-downloads]: https://packagist.org/packages/fingo/laravel-cache-fallback
