<?php
namespace Phooty\Actions;

use Phooty\MatchState;

class Stoppage implements Action
{
    use Support\EmptyAction;

    public function type(): string
    {
        return 'stoppage';
    }

    public function process(MatchState $match)
    {
        return new BallUp();
    }
}
