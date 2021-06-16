<?php
namespace Phooty\Actions\Support;

use Phooty\Core\Engine\PlayerAI;
use Phooty\Entities\Player;
use Phooty\MatchState;

trait IsPlayerAction
{
    protected Player $opponent;

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
        $this->opponent = $match->opposition($teamData)->player($pos);

        return $this->opponent;
    }

    public function getOwnOpponent(MatchState $match)
    {
        return !isset($this->opponent)
            ? $this->getOpponent($this->player->position(), $match)
            : $this->opponent;
    }

    public function getOwnTarget(MatchState $match)
    {
        $target = $this->ai->getOwnTarget($this->player, $match);
        if (!$target) {
            dd($this, $target);
        }
        return $target;
    }

    public function opponent()
    {
        return $this->opponent ?? false;
    }

    public function gainFooty(MatchState $match)
    {
        if ($match->footy()->heldBy() !== $this->player) {
            $match->footy()->gain($this->player);
        }
    }
}
