<?php
declare(strict_types=1);

namespace AA\FeedImporter\Infrastructure\Service;

use AA\FeedImporter\Domain\Video;
use AA\FeedImporter\Domain\Resource;
use AA\FeedImporter\Domain\ReadsFeed;

class CSVFeedReader implements ReadsFeed
{
    /**
     * @var Resource
     */
    private $resource;
    
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }
    public function read(): Array
    {        
        $lines = explode(PHP_EOL, $this->resource->read());
        $feeds = [];
        foreach ($lines as $line) {
            $feed = str_getcsv($line, ';');            
            $this->assertFeed($feed);
            $feeds[] = $feed;
        }
        
        return $feeds;
     }
    
     public function assertFeed(array $feed){

     }
}

