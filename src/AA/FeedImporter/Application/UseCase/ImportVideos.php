<?php
declare(strict_types=1);

namespace AA\FeedImporter\Application\UseCase;

use AA\FeedImporter\Domain\ProvidesVideos;
use AA\FeedImporter\Domain\VideoGateway;

class ImportVideos
{
    /**
     * @var ProvidesVideos
     */
    private $provider;
    
    /**
     * 
     * @var VideoGateway
     */
    private $gateway;
    
    public function __construct(ProvidesVideos $provider, VideoGateway $gateway)
    {
        $this->provider = $provider; 
        $this->gateway = $gateway;
    }
    
    public function execute(): void
    {
        foreach ($this->provider->videos() as $video){
            $this->gateway->save($video);
        }
    }
}

