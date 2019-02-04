<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

use Feeder\Resource\ReadsResource;

abstract class AbstractFeedReader implements ReadsFeed
{
    /**
     * @var ReadsResource
     */
    protected $resource;
    
    /**
     * @var Separator
     */
    protected $separator;
    
    /**
     *
     * @param ReadsResource $resource
     * @param array $separator [feeds, feed, field] CSV [PHP_EOL, ';']   XML ['channel', 'item', 'g']
     */
    public function __construct(ReadsResource $resource, Separator $separator)
    {
        $this->resource = $resource;
        $this->separator= $separator;
    }
    
    abstract public function read(): array;
    
    abstract public function parseFeed($feed): array;

    /**
     * @return ReadsResource
     */
    public function resource(): ReadsResource
    {
        return $this->resource;
    }
    
    public function separator(): Separator
    {
        return $this->separator;
    }
    
    public function update(ReadsResource $resource, Separator $separator): void
    {
        $this->resource = $resource;
        $this->separator = $separator;
    }
}
