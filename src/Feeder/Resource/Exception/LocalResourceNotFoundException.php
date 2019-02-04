<?php
declare(strict_types=1);

namespace Feeder\Resource\Exception;

class LocalResourceNotFoundException extends \Exception
{
    public function __construct(String $url)
    {
        parent::__construct($url);
    }
}
