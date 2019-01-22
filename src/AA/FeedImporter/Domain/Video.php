<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

class Video
{
    /**
     * 
     * @var String
     */
    private $id;
    
    /**
     * 
     * @var String
     */
    private $title;
    
    /**
     * 
     * @var String
     */
    private $url;
    
    /**
     * 
     * @var String[]
     */
    private $tags;

    /**
     * @param String   $id    [description]
     * @param String $title [description]
     * @param String $url   [description]
     * @param Array  $tags  [description]
     */
    public function __construct(String $id, String $title, String $url, Array $tags ){
        $this->id = $id;
        $this->title = $title;
        $this->url = $url;
        $this->tags = $tags; 
    }

    /**
     * @return String
     */
    public function id(): String
    {
      return $this->id;
    }
    
    /**
     * @return String
     */
    public function title(): String
    {
      return $this->title;
    }
    
    /**
     * @return String
     */
    public function url(): String
    {
      return $this->url;
    }
    
    /**
     * @return String[]
     */
    public function tags(): Array
    {
      return $this->tags;
    }
}

