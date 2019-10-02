# API authentication with Laravel and Passport

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tienpham/authentication.svg?style=flat-square)](https://packagist.org/packages/tienpham/authentication)
[![Build Status](https://img.shields.io/travis/tienpham/authentication/master.svg?style=flat-square)](https://travis-ci.org/tienpham/authentication)
[![Quality Score](https://img.shields.io/scrutinizer/g/tienpham/authentication.svg?style=flat-square)](https://scrutinizer-ci.com/g/tienpham/authentication)
[![Total Downloads](https://img.shields.io/packagist/dt/tienpham/authentication.svg?style=flat-square)](https://packagist.org/packages/tienpham/authentication)

## Installation

You can install the package via composer:

```bash
composer require tien-enjoywork/api-auth
```

## Usage
First of all, you have to already set up laravel with [passport](https://laravel.com/docs/5.8/passport) authentication.

```bash
php artisan enjoywork_auth_package:install
```
Edit **app/enjoywork_auth.php** to change configuration you want.

### Document

Please see [DOCUMENT](DOCUMENT.md) for more information about request parameters and respone

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email tiens8acc@enjoyworks.co.kr instead of using the issue tracker.

## Credits

- [Tien Pham](https://github.com/tien-enjoywork)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.