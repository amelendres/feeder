<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

class XmlFeedReader extends AbstractFeedReader
{
    
    public function read(): Array
    {   
        $feed = simplexml_load_string($this->resource->read());
        
        $data = [];
        foreach ($feed->{$this->separator->feeds()}->{$this->separator->feed()} as $item ){
            $data[] = $this->parseFeed($item);
        }

        return $data;
     }
     
     public function parseFeed($item): Array
     {
         $data = (array)$item;
         if(!empty($this->separator->fields())){
             $data = array_merge($data, (array)$item->children($this->separator->fields(), true));
         }
        return $data;
     }
}

