<?php
namespace Phooty\Geometry;

use Evenement\EventEmitterInterface;

class FieldSegment
{
    public function __construct(
        private EventEmitterInterface $emitter,
        private array $entites = []
    ) {
    }

    /**
     * Get the entites currently in the fieldsegment
     */ 
    public function entities()
    {
        return $this->entites;
    }
}
