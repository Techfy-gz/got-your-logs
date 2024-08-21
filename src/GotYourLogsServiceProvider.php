<?php

namespace Techfy\GotYourLogs;

use Illuminate\Support\ServiceProvider;

class GotYourLogsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('gotyourlogs', function () {
            return new Logger();
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/gotyourlogs.php', 'gotyourlogs'
        );
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/gotyourlogs.php' => config_path('gotyourlogs.php'),
        ], 'config');
    }
}
