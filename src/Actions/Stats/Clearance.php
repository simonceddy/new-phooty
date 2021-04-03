<?php
namespace Phooty\Actions\Stats;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support\IsPlayerStat;
use Phooty\MatchState;

class Clearance implements Action, PlayerAction
{
    use IsPlayerStat;

    public function type(): string
    {
        return 'clearance';
    }
        
    public function duration(): int
    {
        return 0;
    }

    public function process(MatchState $match)
    {
        switch (mt_rand(0, 1)) {
            case 0:
                return [Handball::class, $this->player];
            default:
                return [Kick::class, $this->player];
        }
    }
}
