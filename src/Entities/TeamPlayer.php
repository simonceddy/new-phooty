<?php
namespace Phooty\Entities;

use Phooty\Support\{
    CanBecomeJSON,
    HasCoords
};

class TeamPlayer implements Player
{
    use CanBecomeJSON;
    use HasCoords;

    public function __construct(
        private Attributes\TeamData $team,
        private Attributes\PlayerData $player,
        private ? Position $position = null
    ) {}

    public function name(bool $asString = false)
    {
        $gn = $this->player->getGivenName();
        $sn = $this->player->getSurname();
        return !$asString ? [$gn, $sn] : "{$gn} {$sn}"; 
    }

    /**
     * Get the value of player
     */ 
    public function player()
    {
        return $this->player;
    }
    
    /**
     * Get the value of player
     */ 
    public function data()
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

    public function position()
    {
        return $this->position ?? false;
    }
    
    public function assignPos(Position $position)
    {
        $this->position = $position;
    }

    public function __toString()
    {
        return $this->name(true);
    }

    public function toArray()
    {
        return [
            $this->player->toArray(),
            $this->team->toArray(),
            !isset($this->position) ?: $this->position()->type()
        ];
    }
}
