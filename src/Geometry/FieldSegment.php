<?php
namespace Phooty\Geometry;

class FieldSegment
{
    public function __construct(private array $entites = [])
    {
    }

    /**
     * Get the entites currently in the fieldsegment
     */ 
    public function entities()
    {
        return $this->entites;
    }
}
