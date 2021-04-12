<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class RunAndCarry implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    public function type(): string
    {
        return 'runAndCarry';
    }
        
    public function duration(): int
    {
        return 1500;
    }

    public function process(MatchState $match)
    {
        $this->gainFooty($match);

    }
}
