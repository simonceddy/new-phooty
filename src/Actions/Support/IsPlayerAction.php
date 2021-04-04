<?php
namespace Phooty\Actions\Support;

use Phooty\Core\Engine\PlayerAI;
use Phooty\Entities\Player;
use Phooty\MatchState;

trait IsPlayerAction
{
    public function __construct(
        protected PlayerAI $ai,
        protected Player $player,
    ) {
        
    }

    /**
     * Get the Player object.
     * 
     * @return Player
     */ 
    public function player(): Player
    {
        return $this->player;
    }

    protected function getTargetOf(Player $player, MatchState $match)
    {
        $pos = $player->position();

        if (!$pos) {
            throw new \LogicException('No position located');
        }

        $targetPos = $this->getTarget->teamMate($pos);

        return $this->getTarget($targetPos, $match);
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

    public function getOwnOpponent(MatchState $match)
    {
        return $this->getOpponent($this->player->position(), $match);
    }

    public function getOwnTarget(MatchState $match)
    {
        $target = $this->ai->getOwnTarget($this->player, $match);
        if (!$target) {
            dd($this, $target);
        }
        return $target;
    }
}
