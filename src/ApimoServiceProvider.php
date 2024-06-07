<?php

namespace Ashraam\Apimo;

use Illuminate\Support\ServiceProvider;

class ApimoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('apimo.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'apimo');

        // Register the main class to use with the facade
        $this->app->singleton(Apimo::class, function () {
            return new Apimo(config('apimo.provider'), config('apimo.token'), config('apimo.url'));
        });

        $this->app->singleton(Catalog::class, function() {
            return new Catalog(app(Apimo::class));
        });

        $this->app->singleton(Property::class, function() {
            return new Property(app(Apimo::class), config('apimo.agency'));
        });

        $this->app->singleton(Lead::class, function() {
            return new Lead(app(Apimo::class), config('apimo.agency'));
        });
    }
}
