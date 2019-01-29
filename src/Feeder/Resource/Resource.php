<?php
declare(strict_types=1);

namespace Feeder\Resource;

abstract class Resource implements ReadsResource
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

    public abstract function read(): String;

    public abstract function assertUrl(String $url): void;

    /**
     * @return String
     */
    public function url(): String
    {
      return $this->url;
    }
}