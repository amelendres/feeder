<?php
declare(strict_types=1);

namespace Feeder\FeedReader;

interface ReadsFeed
{
    public function read(): array;
}
