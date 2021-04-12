<?php
namespace Phooty\Geometry;

interface Movable
{
    /**
     * Get the current XYCoords object or null if not set.
     * 
     * @return XYCoords|null
     */ 
    public function coords();

    /**
     * Set the current coordinates
     *
     * @param XYCoords $coords
     *
     * @return void
     */
    public function moveTo(XYCoords $coords);
}
