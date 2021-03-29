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
}
