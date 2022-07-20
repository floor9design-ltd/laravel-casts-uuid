# laravel-casts-uuid

[![Latest Version](https://img.shields.io/github/v/release/floor9design-ltd/laravel-casts-uuid?include_prereleases&style=plastic)](https://github.com/floor9design-ltd/laravel-casts-uuid)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=plastic)](LICENCE.md)

[![Build Status](https://travis-ci.com/floor9design-ltd/laravel-casts-uuid.svg?token=x4MFxdDxakjaUk28JSuL)](https://travis-ci.com/github/floor9design-ltd/laravel-casts-uuid)
[![Build Status](https://img.shields.io/codecov/c/github/floor9design-ltd/laravel-casts-uuid?style=plastic)](https://codecov.io/gh/floor9design-ltd/laravel-casts-uuid)

[![Github Downloads](https://img.shields.io/github/downloads/floor9design-ltd/laravel-casts-uuid/total?style=plastic)](https://github.com/floor9design-ltd/laravel-casts-uuid)
[![Packagist Downloads](https://img.shields.io/packagist/dt/floor9design/laravel-casts-uuid?style=plastic)](https://packagist.org/packages/floor9design/laravel-casts-uuid)


## Introduction

The Laravel Framework supports casting of types within models. This class adds the `ramsey/uuid` UUID class support 
for laravel models.

## Install

Add the following to the `composer.json`:

```jsonlines
    "require": {
        "floor9design/laravel-casts-uuid": "^1.0",
    }
```

## Setup

There are no specific config setup steps required.
The class should autoload in PSR-4 compliant systems. If you are using the class on its own, simply include it when
using a model:

```php
use Floor9design\LaravelCasts\Uuid as UuidCasts;

protected $casts = [
    'uuid' => UuidCasts::class
];

```

Note the alias - often it is useful to alias the casting class as it can clash with:

```php
use Ramsey\Uuid\Uuid;

// somewhere in the code:
$uuid = Uuid::uuid4();

```

## Testing

[![Build Status](https://img.shields.io/travis/floor9design-ltd/laravel-casts-uuid?style=plastic)](https://travis-ci.com/github/floor9design-ltd/laravel-casts-uuid)
[![Build Status](https://img.shields.io/codecov/c/github/floor9design-ltd/laravel-casts-uuid?style=plastic)](https://codecov.io/gh/floor9design-ltd/laravel-casts-uuid)

Tests can be run as follows:

* `./vendor/phpunit/phpunit/phpunit`

Static analysis/code review can be performed by using [phpstan](https://phpstan.org/):

* `./vendor/bin/phpstan`

The following tests and also creates code coverage (usually maintained at 100%)

* `./vendor/phpunit/phpunit/phpunit --coverage-html docs/tests/`

## Credits

- [Rick](https://github.com/elb98rm)

## Changelog

A changelog is generated here:

* [Change log](CHANGELOG.md)

## License

This software is proprietary.

* [License File](LICENCE.md)
