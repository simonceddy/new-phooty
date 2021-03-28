<?php
namespace Phooty\Entities;

class Position
{
    public function __construct(
        private string $type,
        private TeamPlayer $teamPlayer
    ) {
        // TODO: write logic here
    }

    public function type()
    {
        return $this->type;
    }

    /**
     * Get the Player object
     * 
     * @return Player
     */ 
    public function player()
    {
        return $this->teamPlayer->player();
    }

    public function team()
    {
        return $this->teamPlayer->team();
    }
}
