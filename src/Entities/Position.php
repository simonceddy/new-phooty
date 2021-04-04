<?php
namespace Phooty\Entities;

class Position
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
}
