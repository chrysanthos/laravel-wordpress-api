# Laravel wrapper for your wordpress site

This package allows you to get articles from your wordpress blog without interacting directly the wordpress rest api and guzzle.

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
