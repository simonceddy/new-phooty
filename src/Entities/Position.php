<?php
namespace Phooty\Entities;

class Position implements \Serializable
{
    public function __construct(private string $type)
    {}

    public function type()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->type;
    }

    public function serialize()
    {
        return serialize($this->type);
    }

    public function unserialize($serialized)
    {
        
        $this->type = unserialize($serialized);
    }
}
