# Environment Synchronization

<p align="center">
    <img src="/.github/images/logo.png?raw=true" alt="Env Sync"/>
</p>

[![StyleCI Status][badge_styleci]][link_styleci]
[![Github Workflow Status][badge_build]][link_build]
[![Coverage Status][badge_coverage]][link_scrutinizer]
[![Scrutinizer Code Quality][badge_quality]][link_scrutinizer]

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Table of contents

* [Installation](#installation)
* [How to use](#how-to-use)
    * [Laravel / Lumen Frameworks](#laravel--lumen-frameworks)
    * [Symfony Framework](#symfony-framework)
    * [Native using](#native-using)

## Installation

To get the latest version of `Environment Synchronization`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require andrey-helldar/env-sync-laravel --dev
```

Or manually update `require-dev` block of `composer.json` and run `composer update`.

```json
{
    "require-dev": {
        "andrey-helldar/env-sync-laravel": "^1.0"
    }
}
```

## How to use

> This package scans files with `*.php`, `*.json`, `*.yml`, `*.yaml` and `*.twig` extensions in the specified folder, receiving from them calls to the `env` and `getenv` functions.
> Based on the received values, the package creates a key-value array. When saving, the keys are split into blocks by the first word before the `_` character.
>
> Also, all keys are sorted alphabetically.

### Laravel / Lumen Frameworks

Just execute the `php artisan env:sync` command.

You can also specify the invocation when executing the `composer update` command in `composer.json` file:

```json
{
    "scripts": {
        "post-update-cmd": [
            "php artisan env:sync"
        ]
    }
}
```

Now, every time you run the `composer update` command, the environment settings file will be synchronized.

If you want to force the stored values, you can change the configuration file by publishing it with the command:

```bash
php artisan vendor:publish --provider="Helldar\EnvSync\Frameworks\Laravel\ServiceProvider"
```

Now you can change the file `config/env-sync.php`.

### Symfony Framework

See the documentation in the [andrey-helldar/env-sync-symfony](https://github.com/andrey-helldar/env-sync-symfony) adapter repository.

### Native using

See the documentation in the [base repository](https://github.com/andrey-helldar/env-sync).


[badge_build]:          https://img.shields.io/github/workflow/status/andrey-helldar/env-sync-laravel/phpunit?style=flat-square

[badge_downloads]:      https://img.shields.io/packagist/dt/andrey-helldar/env-sync-laravel.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/andrey-helldar/env-sync-laravel.svg?style=flat-square

[badge_coverage]:       https://img.shields.io/scrutinizer/coverage/g/andrey-helldar/env-sync-laravel.svg?style=flat-square

[badge_quality]:        https://img.shields.io/scrutinizer/g/andrey-helldar/env-sync-laravel.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/andrey-helldar/env-sync-laravel?label=stable&style=flat-square

[badge_styleci]:        https://styleci.io/repos/334284814/shield

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_build]:           https://github.com/andrey-helldar/env-sync-laravel/actions

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/andrey-helldar/env-sync-laravel

[link_scrutinizer]:     https://scrutinizer-ci.com/g/andrey-helldar/env-sync-laravel/?branch=main

[link_styleci]:         https://github.styleci.io/repos/334284814
