<?php
namespace Phooty\Entities;

use Phooty\Support\HasCoords;

class Sherrin implements Footy
{
    use HasCoords;

    private Player $player;

    public function gain(Player $player)
    {
        $this->player = $player;
    }

    public function loose()
    {
        $this->player = null;
    }

    public function isLoose()
    {
        return isset($this->player);
    }

    public function heldBy()
    {
        return $this->player;
    }
}
