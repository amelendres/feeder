<?php
declare(strict_types=1);

namespace Feeder\Resource;

abstract class AbstractResource implements ReadsResource
{
    /**
     * @var String
     */
    protected $url;

    /**
     * @param String $url
     */
    public function __construct(String $url)
    {
        $this->assertUrl($url);
        $this->url = $url;
    }

    abstract public function read(): String;

    abstract public function assertUrl(String $url): void;

    /**
     * @return String
     */
    public function url(): String
    {
        return $this->url;
    }
}
