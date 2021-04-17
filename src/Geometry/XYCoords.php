<?php
namespace Phooty\Geometry;

class XYCoords
{
    public function __construct(private int $x, private int $y)
    {}

    public function x()
    {
        return $this->x;
    }

    public function y()
    {
        return $this->y;
    }

    /**
     * Return the coordinates as an array. Useful for destructuring.
     *
     * @return array [$x, $y]
     */
    public function toArray()
    {
        return [$this->x, $this->y];
    }

    public function __get(string $name)
    {
        switch (mb_strtolower($name)) {
            case 'x':
                return $this->x;
            case 'y':
                return $this->y;
        }

        throw new \Exception('Undefined property: ' . $name);
    }
}
