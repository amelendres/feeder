<?php
declare(strict_types=1);

namespace Feeder\Resource;

use Feeder\Resource\Exception\HttpResourceNotFoundException;

/**
 *
 * @author AA
 *
 */
class HttpResource extends AbstractResource
{
    const RESOURCE_STATUS_OK = 200;
    
    public function read(): String
    {
        $content = file_get_contents($this->url, true);
        return $content;
    }
    
    public function assertUrl(String $url): void
    {
        $chanel = curl_init($url);
        curl_setopt($chanel, CURLOPT_NOBODY, true);
        curl_exec($chanel);
        $statusCode = curl_getinfo($chanel, CURLINFO_HTTP_CODE);
        curl_close($chanel);
        
        if ($statusCode !== RESOURCE_STATUS_OK) {
            throw new HttpResourceNotFoundException($url);
        }
    }
}
