<?php

namespace Obydul\EasyFeed\Library;

class Read
{
    /** @var string $request */
    private $url;

    /**
     * Read constructor.
     * @param string $url
     */
    public function __construct($url = null)
    {
        $this->url = $url;
    }

    /**
     * Array to Object.
     */
    function arrayToObject($data)
    {
        if (is_array($data)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return json_decode(json_encode($data));
        } else {
            // Return object
            return $data;
        }
    }

    /**
     * Object to Array.
     */
    function objectToArray($data)
    {
        if (is_object($data)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return json_decode(json_encode($data), TRUE);
        } else {
            // Return object
            return $data;
        }
    }

    /**
     * Read feed.
     */
    public function readFeed()
    {
        // result object
        $results = new \stdClass;

        // get feed data
        try {
            $feed_data = simplexml_load_file($this->url, 'SimpleXMLElement', LIBXML_NOCDATA);
            $feed_data_array = $this->objectToArray($feed_data);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        // if feed has data
        if (!empty($feed_data_array)) {

            // get all nodes/attributes
            $nodes_attributes = array();
            foreach ($feed_data_array['channel'] as $channel_key => $channel_value) {
                array_push($nodes_attributes, $channel_key);
            }

            // set data and nodes/attributes to results object
            foreach ($nodes_attributes as $nodes_attribute) {
                $results->$nodes_attribute = $this->arrayToObject($feed_data_array['channel'][$nodes_attribute]);
            }
        }

        // return results as std object
        return $results;
    }


    /**
     * Read multiple feeds.
     * Note: not completed yet
     */
    public function readFeedMultiple()
    {
        // remove all whitespace
        $this->url = str_replace(' ', '', $this->url);

        // explode url
        $feed_links = explode(",", $this->url);

        // result object
        $results = new \stdClass;

        foreach ($feed_links as $xml_link) {

            // get feed data
            try {
                $feed_data = simplexml_load_file($xml_link, 'SimpleXMLElement', LIBXML_NOCDATA);
                $feed_data_array = $this->objectToArray($feed_data);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

            // if feed has data
            if (!empty($feed_data_array)) {

                // get all nodes/attributes
                $nodes_attributes = array();
                foreach ($feed_data_array['channel'] as $channel_key => $channel_value) {
                    array_push($nodes_attributes, $channel_key);
                }

                // set data and nodes/attributes to results object
                foreach ($nodes_attributes as $nodes_attribute) {
                    $results->$nodes_attribute = $this->arrayToObject($feed_data_array['channel'][$nodes_attribute]);
                }
            }
        }

        // return results as std object
        return $results;
    }

}
