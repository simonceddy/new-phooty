<?php
namespace Phooty\Entities\Attributes;

class PlayerRatings implements \ArrayAccess
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
}
