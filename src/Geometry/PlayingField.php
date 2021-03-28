<?php
namespace Phooty\Geometry;

use Ds\{
    Map
};

class PlayingField
{
    private Map $map;

    public function __construct(
        private int $width = 60,
        private int $length = 110
    ) {
        $this->map = new Map();
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
        return $this->width;
    }

    /**
     * Return the playing fields length
     * 
     * @return int
     */ 
    public function length()
    {
        return $this->length;
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
            $this->width,
            $this->length
        ];
    }

    public function at(int $x, int $y, array $entites = [])
    {
        if (!$this->map->offsetExists([$x, $y])) {
            $this->map[[$x, $y]] = new FieldSegment($entites);
        }
        return $this->map[[$x, $y]];
    }
}
