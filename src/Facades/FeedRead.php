<?php

namespace Obydul\EasyFeed\Facades;

use Illuminate\Support\Facades\Facade;

class FeedRead extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'feedRead';
    }
}
