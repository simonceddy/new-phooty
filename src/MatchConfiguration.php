<?php
namespace Phooty;

use Ds\Map;
use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\Team;
use Phooty\Geometry\FieldDimensions;

class MatchConfiguration
{
    private Map $teams;

    public function __construct(
        private Team $homeTeam,
        private Team $awayTeam,
        private FieldDimensions $dimensions
    ) {
        $this->teams = new Map();
        $this->teams[$homeTeam->data()] = $homeTeam;
        $this->teams[$awayTeam->data()] = $awayTeam;
    }

    public function team(TeamData $teamData)
    {
        if (!isset($this->teams[$teamData])) {
            return false;
        }
        return $this->teams[$teamData];
    }

    public function opposition(TeamData $teamData)
    {
        return $this->teams
            ->filter(fn($key) => $teamData !== $key)
            ->first()
            ->value;
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
