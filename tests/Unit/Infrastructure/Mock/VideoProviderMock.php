<?php
declare(strict_types=1);

namespace Tests\Unit\Infrastructure\Mock;

use PHPUnit\Framework\TestCase;
use AA\FeedImporter\Domain\ProvidesVideos;
use AA\FeedImporter\Domain\VideoCollection;

class VideoProviderMock extends TestCase
{
    /**
     * @var ProvidesVideos
     */
    private $mock;
    
    /**
     * 
     */
    public function __construct()
    {
       $this->mock = $this->getMockBuilder(ProvidesVideos::class)
                          ->getMock();
    }
    
    public function mock(): ProvidesVideos
    {
        return $this->mock;
    }
    
    /** 
     * @param VideoCollection $return
     */
    public function shouldGetVideos(VideoCollection $return): void
    {
        $this->mock
        ->expects($this->once())
        ->method('videos')
        ->willReturn($return);
    }
}
