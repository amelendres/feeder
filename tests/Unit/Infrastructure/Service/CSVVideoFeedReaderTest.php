<?php
namespace Tests\Unit\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use AA\FeedImporter\Infrastructure\Service\LocalResource;
use AA\FeedImporter\Infrastructure\Service\Exception\LocalResourceNotFoundException;
use AA\FeedImporter\Infrastructure\Service\CSVFeedReader;
use AA\FeedImporter\Domain\Video;
use Faker\Factory;

class CSVFeedReaderTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldRead()
    {
        $faker = Factory::create();
        
        $resource = new LocalResource($faker->file('./'));
        $feedReader = new CSVFeedReader($resource);
        $this->assertNotNull($feedReader->read()[0]);    
    }

}

