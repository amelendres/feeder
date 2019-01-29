<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

use Feeder\Resource\ReadsResource;

abstract class FeedReader implements ReadsFeed
{
    /**
     * @var ReadsResource
     */
    protected $resource;
    
    public function __construct(ReadsResource $resource)
    {
        $this->resource = $resource;
    }
    
    public abstract function read(): Array; 

    /**
     * @return ReadsResource
     */
    public function resource(): ReadsResource
    {
      return $this->resource;
    }
}

