<?php
namespace Phooty\Actions;

use Phooty\Actions\Action;
use Phooty\MatchState;

class LooseBall implements Action
{
    use Support\GenericAction;

    public function type(): string
    {
        return 'looseBall';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {

    }
}
