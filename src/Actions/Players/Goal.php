<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\CenterBounce;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Goal implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected bool $isStat = true;

    public function type(): string
    {
        return 'goal';
    }
        
    public function duration(): int
    {
        return 1500;
    }

    public function process(MatchState $match)
    {
        return [CenterBounce::class];
    }
}
