# Version header middleware for Laravel and Lumen

This package introduces simple HTTP middleware that adds a release or build version to the response headers.

It works with both the Laravel and Lumen frameworks starting version 5.1.

## Getting started

Require the package via composer: 

```
composer require egeniq/laravel-versionheader
```

### For Lumen

Copy the config file to your config directory:

```
cp vendor/egeniq/laravel-versionheader/config/versionheader.php ./config/versionheader.php
```

And customize the configuration values if necessary.

After that, enable the middleware and register the service provider in your `bootstrap/app.php`.

```
$app->middleware([
    \Egeniq\Laravel\VersionHeader\Http\Middleware\VersionHeader::class,
]);

$app->register(\Egeniq\Laravel\VersionHeader\VersionHeaderServiceProvider::class);
```

### For Laravel

Documentation to be done.
