<?php
namespace AA\FeedImporter\Infrastructure\Service\Exception;

class LocalResourceNotFoundException extends \Exception
{
    public function __construct(String $url){
        parent::__construct($url);
    }
}

