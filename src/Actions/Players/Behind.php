<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Behind implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected bool $isStat = true;

    public function type(): string
    {
        return 'behind';
    }
        
    public function duration(): int
    {
        return 1500;
    }

    public function process(MatchState $match)
    {
        return [
            Kick::class,
            $match->opposition($this->player->team())->player('RBP')
        ];
    }
}
