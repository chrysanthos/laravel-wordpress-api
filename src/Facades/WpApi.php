<?php namespace Chrysanthos\LaravelWordpressApi\Facades;

use Illuminate\Support\Facades\Facade;

class WpApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-wordpress-api';
    }
}