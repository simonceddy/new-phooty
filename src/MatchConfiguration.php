<?php
namespace Phooty;

use Phooty\Entities\Team;
use Phooty\Geometry\FieldDimensions;

class MatchConfiguration
{
    public function __construct(
        private Team $homeTeam,
        private Team $awayTeam,
        private FieldDimensions $dimensions
    ) {
    }

    /**
     * Get the FieldDimensions object
     * 
     * @return FieldDimensions
     */ 
    public function dimensions()
    {
        return $this->dimensions;
    }

    /**
     * Get the homeTeam
     */ 
    public function homeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Get the awayTeam
     */ 
    public function awayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Get players from both teams. Useful for array destructuring.
     *
     * @return array [homeTeam[players], awayTeam[players]]
     */
    public function allPlayers()
    {
        return [
            $this->homeTeam->players(),
            $this->awayTeam->players(),
        ];
    }
}
