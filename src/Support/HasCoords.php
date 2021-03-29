<?php
namespace Phooty\Support;

use Phooty\Geometry\XYCoords;

trait HasCoords
{
    protected ? XYCoords $coords = null;    

    /**
     * Get the current XYCoords object or null if not set.
     * 
     * @return XYCoords|null
     */ 
    public function coords()
    {
        return $this->coords;
    }

    public function moveTo(XYCoords $coords)
    {
        $this->coords = $coords;
    }
}
