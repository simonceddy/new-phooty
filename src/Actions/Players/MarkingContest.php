<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Stoppage;
use Phooty\Actions\Support;
use Phooty\MatchState;

class MarkingContest implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    public function type(): string
    {
        return 'markingContest';
    }
        
    public function duration(): int
    {
        return 1000;
    }

    public function process(MatchState $match)
    {
        if (mt_rand(0, 1) === 0) {
            // No mark taken
            return [Stoppage::class];
        }

        $opponent = $this->getOwnOpponent($match);
        return [
            Mark::class,
            mt_rand(0, 1) === 0 ? $opponent : $this->player
        ];
    }
}
