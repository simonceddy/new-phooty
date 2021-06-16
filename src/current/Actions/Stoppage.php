<?php
namespace Phooty\Actions;

use Phooty\MatchState;

class Stoppage implements Action
{
    use Support\GenericAction;

    public function type(): string
    {
        return 'stoppage';
    }

    public function process(MatchState $match)
    {
        return [BallUp::class];
    }
}
