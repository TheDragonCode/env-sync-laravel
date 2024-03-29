<?php

namespace DragonCode\EnvSync\Frameworks\Laravel;

use DragonCode\EnvSync\Frameworks\Laravel\Console\Sync;
use DragonCode\EnvSync\Support\Config;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    protected $config_path = __DIR__ . '/../config/env-sync.php';

    public function register()
    {
        $this->registerCommands();
        $this->registerConfig();
    }

    public function boot()
    {
        $this->bootConfig();
    }

    protected function registerCommands(): void
    {
        $this->commands(Sync::class);
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom($this->config_path, 'env-sync');

        $this->app->singleton(Config::class, static function ($app) {
            return new Config($app['config']->get('env-sync'));
        });
    }

    protected function bootConfig(): void
    {
        $this->publishes([
            $this->config_path => $this->app->configPath('env-sync.php'),
        ], 'config');
    }
}
