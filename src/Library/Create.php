<?php

namespace Obydul\EasyFeed\Library;

class Create
{
    /** @var array $requests */
    private $requests;

    /** default data */
    private $default_namespaces;
    private $default_version;
    private $default_language;

    /**
     * Read constructor.
     * @param array $requests
     */
    public function __construct($requests = null)
    {
        // get all requests
        $this->requests = $requests;

        // feed namespaces
        $this->default_namespaces = array(
            "dc" => "http://purl.org/dc/elements/1.1/",
            "content" => "http://purl.org/rss/1.0/modules/content/",
            "atom" => "http://www.w3.org/2005/Atom",
        );

        // set feed version
        $this->default_version = "2.0";

        // set language
        $this->default_language = "en-us";
    }

    /**
     * Create feed.
     */
    public function createFeed()
    {
        // create object
        $rss = new \SimpleXMLElement('<rss></rss>');

        // add namespace
        if (isset($this->requests['namespaces'])) {
            foreach ($this->requests['namespaces'] as $namespace_key => $namespace_value) {
                $rss->addAttribute('xmlns:xmlns:' . $namespace_key, $namespace_value);
            }
        } else {
            foreach ($this->default_namespaces as $namespace_key => $namespace_value) {
                $rss->addAttribute('xmlns:xmlns:' . $namespace_key, $namespace_value);
            }
        }

        // set feed version
        if (isset($this->requests['version']))
            $rss->addAttribute('version', $this->requests['version']);
        else
            $rss->addAttribute('version', $this->default_version);

        //add channel node
        $channel = $rss->addChild('channel');

        // feed title
        if (isset($this->requests['title']))
            $channel->addChild('title', $this->requests['title']);

        // feed description
        if (isset($this->requests['description']))
            $channel->addChild('description', $this->requests['description']);

        // feed site link
        if (isset($this->requests['link']))
            $channel->addChild('link', $this->requests['link']);

        // feed language
        if (isset($this->requests['language']))
            $channel->addChild('language', $this->requests['language']);
        else
            $channel->addChild('language', $this->default_language);

        // add image node
        if (isset($this->requests['image'])) {
            $image = $channel->addChild('image');
            $image->addAttribute('title', $this->requests['image']['title']);
            $image->addAttribute('link', $this->requests['image']['link']);
            $image->addAttribute('url', $this->requests['image']['url']);
        }

        // add generator node
        $channel->addChild('generator', 'EasyFeed v1.0.0');

        // feed last build date
        if (isset($this->requests['lastBuildDate']))
            $channel->addChild('lastBuildDate', $this->requests['lastBuildDate']);

        // add atom node
        $atom = $channel->addChild('atom:atom:link');
        if (isset($this->requests['link']))
            $atom->addAttribute('href', $this->requests['link']);
        $atom->addAttribute('rel', 'self');
        $atom->addAttribute('type', 'application/rss+xml');

        // feed items
        if (isset($this->requests['items'])) {
            foreach ($this->requests['items'] as $feedItemsValues) {

                // get item keys
                $feedItemKeys = array();
                foreach ($feedItemsValues as $key => $value) {
                    array_push($feedItemKeys, $key);
                }

                // set item keys & values in xml
                $item = $channel->addChild('item'); //add item node
                foreach ($feedItemKeys as $feedValue) {
                    $item->addChild($feedValue, $feedItemsValues[$feedValue]); // add item attribute
                }
            }
        }

        // return as XML
        return $rss->asXML();
    }

}
