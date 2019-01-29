<?php
declare(strict_types=1);

namespace Tests\Feeder\FeedReader;

use PHPUnit\Framework\TestCase;
use Feeder\Resource\LocalResource;
use Feeder\FeedReader\CsvFeedReader;
use Faker\Factory;

class CsvFeedReaderTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReadWithLocalResource()
    {
        $faker = Factory::create();
        
        $resource = new LocalResource($faker->file('./'));
        $feedReader = new CsvFeedReader($resource);
        $this->assertNotNull($feedReader->read()[0]);    
    }

}

