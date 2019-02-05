<?php
declare(strict_types=1);

namespace Tests\Feeder\Resource;

use PHPUnit\Framework\TestCase;
use Faker\Factory;
use Feeder\Resource\Exception\HttpResourceNotFoundException;
use Feeder\Resource\HttpResource;

class HttpResourceTest extends TestCase
{
    /**
     * @test
     */
    public function _itShouldThrowLocalResourceNotFoundException()
    {
        $this->expectException(HttpResourceNotFoundException::class);
        $faker = Factory::create();
        $url = $faker->url;
        
        $mock = $this->getMockBuilder(HttpResource::class)
        ->setConstructorArgs([$url])
        ->setMethods(['assertUrl'])
        ->getMock();
        
        $mock->expects($this->once())
        ->method('assertUrl')
        ->willThrowException(new HttpResourceNotFoundException($url));
        
        $mock->assertUrl($url);
        
        new HttpResource($url);
    }

    /**
     * @test
     */
    public function itShouldRead()
    {
        $mock = $this->prophesize(HttpResource::class);
        $mock->read()->willReturn('something');
        $resource = $mock->reveal();
       
        $this->assertEquals('something', $resource->read());
    }
}
