<?php
namespace Phooty\Actions\Support;

use Phooty\Entities\TeamPlayer;

trait IsPlayerStat
{
    public function __construct(protected TeamPlayer $player)
    {
        
    }

    /**
     * Get the TeamPlayer object.
     * 
     * @return TeamPlayer
     */ 
    public function player()
    {
        return $this->player;
    }
}
