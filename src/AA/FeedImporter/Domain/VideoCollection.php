<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

class VideoCollection extends ObjectCollection
{ 
    protected function assertObject($object): void{
        if (!is_a($object, $this->className())) {
            throw new InvalidVideoException($exception);
        }
    }
    
    protected function className(): String
    {
      return Video::class;  
    }
    
    public function add(Video $object){
        $this->objects[] = $object;
    }
}

