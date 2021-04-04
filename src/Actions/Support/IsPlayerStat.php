<?php
namespace Phooty\Actions\Support;

use Phooty\Entities\TeamPlayer;
use Phooty\MatchState;

trait IsPlayerStat
{
    public function __construct(
        protected GetTarget $getTarget,
        protected TeamPlayer $player,
    ) {
        
    }

    /**
     * Get the TeamPlayer object.
     * 
     * @return TeamPlayer
     */ 
    public function player(): TeamPlayer
    {
        return $this->player;
    }

    protected function getTarget(string $pos, MatchState $match)
    {
        $teamData = $this->player->team();
        $target = $match->team($teamData)->player($pos);

        return $target;
    }

    protected function getOpponent(string $pos, MatchState $match)
    {
        $teamData = $this->player->team();
        $opponent = $match->opposition($teamData)->player($pos);

        return $opponent;
    }
}
