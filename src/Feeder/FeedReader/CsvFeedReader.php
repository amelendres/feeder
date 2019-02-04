<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

class CsvFeedReader extends AbstractFeedReader
{
    public function read(): array
    {
        $lines = explode(PHP_EOL, $this->resource->read());
        $feeds = [];
        foreach ($lines as $feed) {
            $feeds[] = $this->parseFeed($feed);
        }
        
        return $feeds;
    }
     
    public function parseFeed($feed): array
    {
        return str_getcsv($feed, $this->separator->fields());
    }
}
