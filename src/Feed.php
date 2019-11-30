<?php

namespace Obydul\EasyFeed;

use Obydul\EasyFeed\Library\Create;
use Obydul\EasyFeed\Library\Read;

class Feed
{
    /** @var array $requests */
    private $requests;

    /**
     * Set requests.
     */
    public function __set($name, $value)
    {
        $this->requests[$name] = $value;
    }

    /**
     * Get requests.
     */
    public function __get($name)
    {
        return $this->requests[$name];
    }

    /**
     * Display all requests.
     */
    public function toArray()
    {
        return $this->requests;
    }

    /**
     * Create feed.
     */
    public function create()
    {
        $create = new Create($this->requests);
        return $create->createFeed();
    }

    /**
     * Read feed.
     */
    public function url($url)
    {
        $read = new Read($url);
        return $read->readFeed();
    }
}
