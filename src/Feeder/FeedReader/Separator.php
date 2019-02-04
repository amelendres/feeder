<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

class Separator
{    
    /**
     * @var String
     */
    private $feeds;
    
    /**
     * @var String
     */
    private $feed;
    
    /**
     * @var String|null
     */
    private $fields;

    /**
     * @param String   $feed   
     * @param String   $fields   
     * @param String|null $feeds   
     */
    public function __construct(String $feed, String $fields, String $feeds=null)
    {
        $this->feed = $feed;
        $this->fields = $fields;
        $this->feeds = $feeds;
    }

    /**
     * @return String
     */
    public function feeds(): String
    {
      return $this->feeds;
    }
    
    /**
     * @return String
     */
    public function feed(): String
    {
      return $this->feed;
    }
    
    /**
     * @return String
     */
    public function fields(): String
    {
      return $this->fields;
    }
}

