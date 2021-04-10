<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\PlayerData;
use Phooty\Entities\Attributes\TeamData;
use Phooty\Support\CanBecomeJSON;

class TeamPlayer implements Player
{
    use CanBecomeJSON;

    public function __construct(
        private TeamData $team,
        private PlayerData $player,
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
    
    public function assignPos(Position $position): Player
    {
        return new static($this->team, $this->player, $position);
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
