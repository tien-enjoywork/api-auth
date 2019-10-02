# API authentication with Laravel and Passport

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tien-enjoywork/api-auth.svg?style=flat-square)](https://packagist.org/packages/tien-enjoywork/api-auth)
[![Build Status](https://img.shields.io/travis/tien-enjoywork/api-auth/master.svg?style=flat-square)](https://travis-ci.org/tien-enjoywork/api-auth)
[![Quality Score](https://img.shields.io/scrutinizer/g/tien-enjoywork/api-auth.svg?style=flat-square)](https://scrutinizer-ci.com/g/tien-enjoywork/api-auth)
[![Total Downloads](https://img.shields.io/packagist/dt/tien-enjoywork/api-auth.svg?style=flat-square)](https://packagist.org/packages/tien-enjoywork/api-auth)

## Installation

You can install the package via composer:

```bash
composer require tien-enjoywork/api-auth
```

## Usage
First of all, you have to already set up laravel with [passport](https://laravel.com/docs/6.x/passport#installation) authentication.

```bash
php artisan enjoywork_auth_package:install
```
Edit **app/enjoywork_auth.php** to change configuration. Remember run `php artisan config:cache` after edit this file.

## Document

Please see [DOCUMENT](DOCUMENT.md) for more information about request parameters and respone

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email tiens8acc@enjoyworks.co.kr instead of using the issue tracker.

## Credits

- [Tien Pham](https://github.com/tien-enjoywork)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.