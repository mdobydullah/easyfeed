<?php

namespace Obydul\EasyFeed;

use Illuminate\Support\ServiceProvider;

class EasyFeedServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        // Register a class in the service container
        $this->app->bind('feedRead', function ($app) {
            return new Feed();
        });
    }

    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
