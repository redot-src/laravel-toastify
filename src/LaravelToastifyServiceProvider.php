<?php

namespace Redot\LaravelToastify;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelToastifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Toastify::class, fn () => new Toastify());
        $this->app->alias(Toastify::class, 'toastify');

        Blade::directive('toastifyCss', fn () => "<?php echo app('toastify')->css(); ?>");
        Blade::directive('toastifyJs', fn () => "<?php echo app('toastify')->js(); ?>");
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
