<?php
namespace Phooty\Actions;

use Phooty\Actions\Disposals\Hitout;
use Phooty\MatchState;

class CenterBounce implements Action
{
    use Support\IsRuckContest;

    public function duration(): int
    {
        return 1000;
    }

    public function process(MatchState $match)
    {
        return new Hitout($this->ruckContest($match));
    }

    public function type(): string
    {
        return 'centerBounce';
    }
}
