<?php
namespace Phooty\Core\Engine\Players;

use Phooty\Geometry\Movable;
use Phooty\Geometry\PlayingField;

class AwareOfSurroundings
{
    public function __construct(private int $range = 50)
    {}

    private function getRange(int $i)
    {
        return [$i - $this->range, $i + $this->range];
    }

    private function withinRange(int $i, int $min, int $max)
    {
        return $i >= $min && $i <= $max;
    }

    public function within(int $range)
    {
        return new static($range);
    }

    /**
     * Return Players within range
     *
     * @param PlayingField $field
     * @param Movable $entity
     *
     * @return Map
     */
    public function nearbyPlayers(PlayingField $field, Movable $entity)
    {
        [$x, $y] = $entity->coords()->toArray();
        [$minX, $maxX] = $this->getRange($x);
        [$minY, $maxY] = $this->getRange($y);

        $map = $field->getMap()
            ->filter(
                fn($key) => $this->withinRange($key[0], $minX, $maxX)
                    && $this->withinRange($key[1], $y, $maxY)
            );

        return $map;    
    }
}
