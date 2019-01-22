<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

Interface Resource
{
    public function read(): String;
}

