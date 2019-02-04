<?php
declare(strict_types=1);

namespace Tests\Feeder\FeedReader;

use PHPUnit\Framework\TestCase;
use Feeder\FeedReader\XmlFeedReader;
use Tests\Feeder\_Mock\ReadsResourceMock;
use Feeder\FeedReader\Separator;

class XmlFeedReaderTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldRead()
    {
        $xml = '<?xml version="1.0"?>
                <rss version="2.0" xmlns:g="http://base.google.com/ns/1.0"> 
                <channel>
                    <title>Products feeds</title> 
                    <link>http://www.example.com/feed/products</link>
                    <description>Products feeds</description>
                    <item>
                        <title>Royal canin, 12kg</title>
                        <link>http://www.example.com/royalCanin12kg</link>
                        <description>Royal canin, 12kg senior light</description> 
                        <g:image_link>http://www.example.com/image1.jpg</g:image_link> 
                        <g:price>25</g:price>
                        <g:reduced_price>20</g:reduced_price> 
                        <g:ean>12345</g:ean>
                        <g:id>1</g:id>
                    </item>
                    <item>
                        <title>Royal canin, 3kg</title> <link>http://www.example.com/royalCanin3kg</link> <description>Royal canin, 3kg senior light</description> <g:image_link>http://www.example.com/image2.jpg</g:image_link> <g:price>23</g:price>
                        <g:reduced_price>15</g:reduced_price>
                        <g:ean>12346</g:ean>
                        <g:id>1</g:id>
                    </item>
                </channel>
                </rss>';
        
        $resource = new ReadsResourceMock();
        
        $feedReader = new XmlFeedReader($resource->mock(), new Separator('item', 'g', 'channel'));
        $resource->shouldRead($xml);
        $this->assertEquals(8, count($feedReader->read()[0]));
    }
}
