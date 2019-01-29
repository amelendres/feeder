<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

Interface ReadsFeed
{
    public function read(): Array;
}
