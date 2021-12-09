<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class BotCheckProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('bot', function () {
            return (isset($_GET['bot']) ||
                isset($_SERVER['HTTP_USER_AGENT'])
                && preg_match('/bot|crawl|slurp|spider|mediapartners|Chrome-Lighthouse/i', $_SERVER['HTTP_USER_AGENT'])
            );
        });

    }
}
