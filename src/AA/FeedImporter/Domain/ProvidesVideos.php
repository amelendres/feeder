<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

use AA\FeedImporter\Domain\VideoCollection;

Interface ProvidesVideos
{
    public function videos(): VideoCollection;
}

