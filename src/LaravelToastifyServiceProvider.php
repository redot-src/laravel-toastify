<?php

namespace Redot\LaravelToastify;

use Illuminate\Support\ServiceProvider;

class LaravelToastifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Toastify::class, function () {
            return new Toastify();
        });
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/toastify.php',
            'toastify'
        );

        $this->loadViewsFrom(
            __DIR__.'/../resources/views',
            'toastify'
        );

        $this->publishes([
            __DIR__.'/../config/toastify.php' => $this->app->configPath('toastify.php'),
        ], 'toastify-config');
    }
}
