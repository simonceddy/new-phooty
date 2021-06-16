<?php
namespace Phooty\Entities\Attributes;

class PlayerRatings implements \ArrayAccess, \Serializable
{
    public function __construct(private array $ratings)
    {
        
    }

    public function ratingNames()
    {
        return array_keys($this->ratings);
    }

    public function offsetExists($offset)
    {
        return isset($this->ratings[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->ratings[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        
    }

    public function offsetUnset($offset)
    {
        
    }

    public function serialize()
    {
        return serialize($this->ratings);
    }

    public function unserialize($serialized)
    {
        $this->ratings = unserialize($serialized);
    }
}
