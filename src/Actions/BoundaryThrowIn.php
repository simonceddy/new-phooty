<?php
namespace Phooty\Actions;

use Phooty\MatchState;

class BoundaryThrowIn implements Action
{
    use Support\GenericAction;

    public function type():string
    {
        return 'throwIn';
    }

    public function duration(): int
    {
        return 1500;
    }

    public function process(MatchState $match)
    {
        
    }
}
