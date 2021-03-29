<?php
namespace Phooty\Actions\Disposals;

use Phooty\Actions\Action;
use Phooty\Actions\Support\IsPlayerStat;
use Phooty\MatchState;

class Hitout implements Action
{
    use IsPlayerStat;

    public function type(): string
    {
        return 'hitout';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {

    }
}
