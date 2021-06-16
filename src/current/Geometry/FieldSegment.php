<?php
namespace Phooty\Geometry;

use Evenement\EventEmitterInterface;
use Phooty\Exceptions\PhootyException;
use Phooty\Support\HasCoords;

class FieldSegment
{
    use HasCoords;

    public function __construct(
        private EventEmitterInterface $emitter,
        XYCoords $coords,
        private array $entities = [],
    ) {
        $this->coords = $coords;
    }

    public function addEntity(Movable $entity)
    {
        $entity->moveTo($this->coords);
        $this->entities[] = $entity;
    }

    public function removeEntity(Movable $entity)
    {
        $this->entities = array_filter(
            $this->entities,
            fn($ent) => $ent !== $entity
        );

        if (empty($this->entities)) {
            $this->emitter->emit('field.segment.empty', [$this]);
        }
    }

    /**
     * Get the entities currently in the fieldsegment
     * 
     * @return array
     */ 
    public function entities()
    {
        return $this->entities;
    }

    public function moveTo()
    {
        throw new PhootyException('Cannot move a field segment');
    }
}
