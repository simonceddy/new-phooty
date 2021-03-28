<?php
namespace Phooty;

use Phooty\Entities\Team;
use Phooty\Geometry\PlayingField;

class MatchConfiguration
{
    public function __construct(
        private Team $homeTeam,
        private Team $awayTeam,
        private PlayingField $field
    ) {
    }

    /**
     * Get the PlayingField
     * 
     * @return PlayingField
     */ 
    public function field()
    {
        return $this->field;
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
