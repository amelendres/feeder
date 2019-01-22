<?php
declare(strict_types=1);

namespace AA\FeedImporter\Infrastructure\Service;


use AA\FeedImporter\Domain\Resource;
use AA\FeedImporter\Infrastructure\Service\Exception\LocalResourceNotFoundException;
/**
 * 
 * @author AA
 *
 */
class LocalResource implements Resource
{
    /**
     * @var String
     */
    private $url;
    
    public function __construct(String $url)
    {
        $this->assertUrl($url);
        $this->url = $url;    
    }
    
    public function read(): String
    {
        $content = file_get_contents($this->url, true);
        return $content;
    }
    
    public function assertUrl(String $url){
        if(!is_file($url)){
            throw new LocalResourceNotFoundException($url);
        }
    }
}

