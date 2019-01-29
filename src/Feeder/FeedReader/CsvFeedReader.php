<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

use Feeder\Resource\Resource;
use Feeder\FeedReader\ReadsFeed;

class CsvFeedReader extends FeedReader
{
    public function read(): Array
    {        
        $lines = explode(PHP_EOL, $this->resource->read());
        $feeds = [];
        foreach ($lines as $line) {
            $feed = str_getcsv($line, ';');            
            $feeds[] = $feed;
        }
        
        return $feeds;
     }
}

