<?php namespace Chrysanthos\LaravelWordpressApi;

use Illuminate\Support\ServiceProvider;

class LaravelWordpressApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/wordpress-api.php' => base_path('config/wordpress-api.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/wordpress-api.php', 'wordpress-api');
        $this->app->bind('laravel-wordpress-api', function () {
            return new WpApi(config('wordpress-api.endpoint'));
        });

    }
}