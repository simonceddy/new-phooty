<?php
namespace Phooty\Actions\Support;

use Phooty\MatchState;

trait EmptyAction
{
    public function duration(): int
    {
        return 0;
    }

    public function process(MatchState $match)
    {
        
    }

    public function type()
    {
        return 'empty';
    }
}
