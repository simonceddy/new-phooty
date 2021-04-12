<?php
namespace Phooty\Geometry;

use Ds\{
    Map
};
use Evenement\EventEmitterInterface;

class PlayingField
{
    private Map $map;

    public function __construct(
        private FieldDimensions $dimensions,
        private EventEmitterInterface $emitter
    ) {
        $this->map = new Map();

        $this->emitter->on(
            'field.segment.empty',
            fn() => dump(
                'empty segment event. remove segment object from map'
            )
        );
    }

    /**
     * Get the coordinates map
     */ 
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Return the playing field width
     * 
     * @return int
     */ 
    public function width()
    {
        return $this->dimensions->width();
    }

    /**
     * Return the playing fields length
     * 
     * @return int
     */ 
    public function length()
    {
        return $this->dimensions->length();
    }

    /**
     * Returns dimensions in a sequential array as [width, length].
     * 
     * This method can be used with array destructuring.
     *
     * @return array
     */
    public function dimensions()
    {
        return [
            $this->dimensions->width(),
            $this->dimensions->length()
        ];
    }

    public function at(int $x, int $y, array $entities = [])
    {
        // TODO validate coords within dimensions
        if (!$this->map->offsetExists([$x, $y])) {
            $this->map[[$x, $y]] = new FieldSegment(
                $this->emitter,
                new XYCoords($x, $y)
            );
        }

        if (!empty($entities)) {
            foreach ($entities as $entity) {
                if (!$entity instanceof Movable) {
                    throw new \InvalidArgumentException(
                        'Invalid entity provided to field segment!'
                    );
                }
                $this->map[[$x, $y]]->addEntity($entity);
            }
        }
        
        return $this->map[[$x, $y]];
    }
}
