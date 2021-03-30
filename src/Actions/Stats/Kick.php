<?php
namespace Phooty\Actions\Stats;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support\IsPlayerStat;
use Phooty\MatchState;

class Kick implements Action, PlayerAction
{
    use IsPlayerStat;

    public function type(): string
    {
        return 'kick';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {

    }
}
