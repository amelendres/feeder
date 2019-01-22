<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

Interface VideoGateway
{
    public function save(Video $video): void;
}
