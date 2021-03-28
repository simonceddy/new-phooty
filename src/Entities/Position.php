<?php
namespace Phooty\Entities;

class Position
{
    public function __construct(private string $type, private Player $player)
    {
        // TODO: write logic here
    }

    public function type()
    {
        return $this->type;
    }

    /**
     * Get the value of player
     */ 
    public function player()
    {
        return $this->player;
    }
}
