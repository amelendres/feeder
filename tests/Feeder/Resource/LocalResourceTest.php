<?php
namespace Tests\Feeder\Resource;

use PHPUnit\Framework\TestCase;
use Feeder\Resource\LocalResource;
use Feeder\Resource\Exception\LocalResourceNotFoundException;
use Faker\Factory;

class LocalResourceTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldThrowLocalResourceNotFoundException()
    {
        $this->expectException(LocalResourceNotFoundException::class);
        
        new LocalResource('http://google.com');
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
