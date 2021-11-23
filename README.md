# Environment Synchronization

<img src="https://preview.dragon-code.pro/TheDragonCode/env-sync.svg?brand=laravel" alt="Environment Synchronization"/>

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![Github Workflow Status][badge_build]][link_build]
[![License][badge_license]][link_license]

## Installation

To get the latest version of `Environment Synchronization`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require dragon-code/env-sync-laravel --dev
```

Or manually update `require-dev` block of `composer.json` and run `composer update`.

```json
{
    "require-dev": {
        "dragon-code/env-sync-laravel": "^2.0"
    }
}
```

### Upgrade from `andrey-helldar/env-sync-laravel`

1. In your `composer.json` file, replace `"andrey-helldar/env-sync-laravel": "^1.0"` with `"dragon-code/env-sync-laravel": "^2.0"`.
2. Run the `composer update` command.

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
php artisan vendor:publish --provider="DragonCode\EnvSync\Frameworks\Laravel\ServiceProvider"
```

Now you can change the file `config/env-sync.php`.

### Native using

See the documentation in the [base repository](https://github.com/TheDragonCode/env-sync).

## License

This package is licensed under the [MIT License](LICENSE).


[badge_build]:          https://img.shields.io/github/workflow/status/TheDragonCode/env-sync-laravel/phpunit?style=flat-square

[badge_downloads]:      https://img.shields.io/packagist/dt/dragon-code/env-sync-laravel.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/dragon-code/env-sync-laravel.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/TheDragonCode/env-sync-laravel?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_build]:           https://github.com/TheDragonCode/env-sync-laravel/actions

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/dragon-code/env-sync-laravel
