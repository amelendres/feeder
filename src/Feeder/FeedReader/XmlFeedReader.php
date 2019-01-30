<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

use Feeder\Resource\ReadsResource;

class XmlFeedReader extends FeedReader
{
    private $channel;
    
    private $item;
    
    private $child;
    
    public function __construct(ReadsResource $resource, String $channel, String $item, String $child='')
    {
        parent::__construct($resource);
        $this->channel = $channel;
        $this->item = $item;
        $this->child = $child;
    }
    
    public function read(): Array
    {   
        $feed = simplexml_load_string($this->resource->read());
        
        $data = [];
        foreach ($feed->{$this->channel}->{$this->item} as $item ){
            $data[] = $this->parseFeed($item);
        }

        return $data;
     }
     
     public function parseFeed($item): Array
     {
         $data = (array)$item;
         if(!empty($this->child)){
             $data = array_merge($data, (array)$item->children($this->child, true));
         }
        return $data;
     }
}

