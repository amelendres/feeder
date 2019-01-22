<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

Interface ReadsFeed
{
    public function read(): Array;
}

