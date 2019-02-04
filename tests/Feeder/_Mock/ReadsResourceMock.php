<?php
declare(strict_types=1);

namespace tests\Feeder\_Mock;

use PHPUnit\Framework\TestCase;
use Feeder\Resource\ReadsResource;

class ReadsResourceMock extends TestCase
{
    /**
     * @var ReadsResource
     */
    private $mock;
    
    /**
     *
     */
    public function __construct()
    {
        $this->mock = $this->getMockBuilder(ReadsResource::class)
        ->getMock();
    }
    
    public function mock(): ReadsResource
    {
        return $this->mock;
    }
    
    /**
     * @param String $return
     */
    public function shouldRead(String $return): void
    {
        $this->mock
        ->expects($this->once())
        ->method('read')
        ->willReturn($return);
    }
}
