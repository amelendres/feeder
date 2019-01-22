<?php
declare(strict_types=1);

namespace AA\FeedImporter\Domain;

abstract class ObjectCollection implements \ArrayAccess, \Countable, \IteratorAggregate
{ 
    /**
     * 
     * @var Array
     */
    protected $objects;
    
    public function __construct(Array $objects){
        foreach ($objects as $object){
            $this->assertObject($object);
            $this->objects[] = $object;
        }
    }
    
    abstract protected function assertObject($object): void;
    
    abstract protected function className(): String;
  
    
    public function elements(): array
    {
        return $this->objects;
    }

    public function offsetExists($offset)
    {
        return isset($this->objects[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return $this->objects[$offset];
    }
    
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->objects[] = $value;
        } else {
            $this->objects[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->objects[$offset]);
    }
    
    public function count()
    {
        return count($this->objects);
    }
    
    public function getIterator()
    {
        return new \ArrayIterator($this->objects);
    }
}

