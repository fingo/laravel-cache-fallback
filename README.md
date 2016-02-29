# CacheFallback

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]
[![Code Quality][cq-badge]][cq-link]

Package for falling back cache drivers if current is not available.

Be advised that if the last driver fails, normal laravel Error is thrown

## Usage
Add fallback provider to config/app.php
``` php
Fingo\LaravelCacheFallback\CacheFallbackServiceProvider::class,
```

Default fallback order is: redis, memcached, database, cookie, file, array

If needed to change fallback order, publish vendors
 ``` bash
 php artisan vendor:publish --provider="Fingo\LaravelCacheFallback\CacheFallbackServiceProvider"
 ```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

 - [Hubert Jędrzejek][link-author]
 - [All Contributors][link-contributors]

## License

The Apache license Version 2.0. Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/fingo/laravel-cache-fallback.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-Apache%202.0-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/fingo/laravel-cache-fallback/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/fingo/laravel-cache-fallback.svg?style=flat-square
[cq-badge]: https://insight.sensiolabs.com/projects/fe703ae4-3675-46d7-be31-13da23d84ceb/mini.png

[link-packagist]: https://packagist.org/packages/fingo/laravel-cache-fallback
[link-travis]: https://travis-ci.org/fingo/laravel-cache-fallback
[link-downloads]: https://packagist.org/packages/fingo/laravel-cache-fallback
[cq-link]: https://insight.sensiolabs.com/projects/fe703ae4-3675-46d7-be31-13da23d84ceb

[link-author]: https://github.com/HubertJedrzejek
[link-contributors]: ../../contributors