<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\TeamData;

class TeamPlayer
{
    public function __construct(
        private TeamData $team,
        private Player $player
    )
    {}

    /**
     * Get the value of player
     */ 
    public function player()
    {
        return $this->player;
    }

    /**
     * Get the value of team
     */ 
    public function team()
    {
        return $this->team;
    }
}
