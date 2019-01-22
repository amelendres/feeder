<?php
namespace AA\FeedImporter\Infrastructure\Persistence\Cassandra;

use AA\FeedImporter\Domain\VideoGateway;
use AA\FeedImporter\Domain\Video;

class VideoRepository implements VideoGateway
{
    public function save(Video $video): void
    {
        $tags = implode(',', $video->tags());
        echo "importing: {$video->title()}; Url: {$video->url()}; tags:{$tags} \n";
    }
}

