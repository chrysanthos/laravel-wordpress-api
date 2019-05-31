# Laravel wrapper for your wordpress site
[![Latest Version](https://img.shields.io/github/release/chrysanthos/laravel-wordpress-api.svg?style=flat-square)](https://github.com/chrysanthos/laravel-wordpress-api/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/chrysanthos/laravel-wordpress-api.svg?style=flat-square)](https://packagist.org/packages/chrysanthos/laravel-wordpress-api)

This package allows you to get articles from your wordpress blog without interacting directly with the wordpress rest api and guzzle.

## Available methods

It currently has only these two methods available (That's all I needed, let me know if you have any requests).

### Get latest articles
```php
WpApi::latest(10);
```
### Get specific article
```php
WpApi::post($slug);
```
