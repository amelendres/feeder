<?php
declare(strict_types=1);

namespace Feeder\Resource;

use Feeder\Resource\Exception\LocalResourceNotFoundException;

/**
 * 
 * @author AA
 *
 */
class LocalResource extends Resource
{   
    public function read(): String
    {
        $content = file_get_contents($this->url, true);
        return $content;
    }
    
    public function assertUrl(String $url): void
    {
        if(!is_file($url)){
            throw new LocalResourceNotFoundException($url);
        }
    }
}

