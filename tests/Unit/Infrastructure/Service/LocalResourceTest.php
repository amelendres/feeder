<?php
namespace Tests\Unit\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use AA\FeedImporter\Infrastructure\Service\LocalResource;
use AA\FeedImporter\Infrastructure\Service\Exception\LocalResourceNotFoundException;
use Faker\Factory;

class LocalResourceTest extends TestCase
{
    
    /**
     * @test
     */
    public function itShouldThrowLocalResourceNotFoundException()
    {
        $this->expectException(LocalResourceNotFoundException::class);
        $resource = new LocalResource('http://google.com');        
    }

    /**
     * @test
     */
    public function itShouldRead()
    {
        $faker = Factory::create();

        $resource = new LocalResource($faker->file('./'));
        $this->assertNotNull($resource->read());    
    }
}

