<?php
declare(strict_types=1);

namespace AA\FeedImporter\Infrastructure\Service;

use AA\FeedImporter\Domain\VideoCollection;
use AA\FeedImporter\Domain\ProvidesVideos;
use AA\FeedImporter\Domain\ReadsFeed;
use AA\FeedImporter\Domain\Video;
use Ramsey\Uuid\Uuid;

class VideoProvider implements ProvidesVideos
{
    /**
     * 
     * @var ReadsFeed
     */
    private $feedReader;
    
    public function __construct(ReadsFeed $feedReader)
    {
        $this->feedReader = $feedReader; 
    }
    
    public function videos(): VideoCollection
    {
        $videos = [];
        foreach ($this->feedReader->read() as $feed) {
            $videos[] = new Video($this->nextId(), $feed[0], $feed[1], explode(',', $feed[2]));
        }
        
        return new VideoCollection($videos); 
    }

    public function nextId(): String
    {
     return Uuid::uuid4()->toString();
    }
}

