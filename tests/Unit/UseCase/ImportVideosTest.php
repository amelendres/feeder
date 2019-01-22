<?php
declare(strict_types=1);

namespace Tests\Unit\UseCase;

use PHPUnit\Framework\TestCase;
use Faker\Factory;
use AA\FeedImporter\Domain\Video;
use AA\FeedImporter\Application\UseCase\ImportVideos;
use AA\FeedImporter\Domain\VideoCollection;
use Tests\Unit\Infrastructure\Mock\VideoProviderMock;
use AA\FeedImporter\Infrastructure\Persistence\Cassandra\VideoRepository;

class ImportVideosTest extends TestCase
{
    /**
     *
     * @var VideoProviderMock
     */
    protected $provider;
    
    /**
     * 
     * @var VideoGateway
     */
    protected $gateway;
    
    protected function setUp()
    {
        
        $this->provider = new VideoProviderMock();
        //todo: mock
        $this->gateway = new VideoRepository();
    }
    /**
     * @test
     */
    public function itShouldImportVideos()
    {
        $faker = Factory::create();
        $videos[] = new Video($faker->uuid, $faker->title, $faker->url, $faker->words );
        $videos[] = new Video($faker->uuid, $faker->title, $faker->url, $faker->words );
        $videos[] = new Video($faker->uuid, $faker->title, $faker->url, $faker->words );
        $videos[] = new Video($faker->uuid, $faker->title, $faker->url, $faker->words );
        
        $this->expectOutputRegex('@^(?:http://)?([^/]+)@i');
        
        $importVideos = new ImportVideos($this->provider->mock(), $this->gateway);
        
        $this->provider->shouldGetVideos(new VideoCollection($videos), $this->gateway);
        $importVideos->execute();
    }
    
}

