<?php

namespace Egeniq\Laravel\VersionHeader;

use Egeniq\Laravel\VersionHeader\Http\Middleware\VersionHeader;
use Illuminate\Support\ServiceProvider;

class VersionHeaderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (str_contains($this->app->version(), 'Lumen')) {
            $this->app->configure('versionheader');

            return;
        }

        $this->publishes([
            __DIR__ . '/../config/versionheader.php' => config_path('versionheader.php'),
        ], 'versionheader');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/versionheader.php', 'versionheader');

        $this->app->singleton(VersionHeader::class, function () {
            return new VersionHeader(config('versionheader.header_name'), config('versionheader.version'));
        });
    }
}
