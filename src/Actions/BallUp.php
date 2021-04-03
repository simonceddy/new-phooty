<?php
namespace Phooty\Actions;

use Phooty\Actions\Stats\Hitout;
use Phooty\MatchState;

class BallUp implements Action
{
    use Support\IsRuckContest;

    public function duration(): int
    {
        return 800;
    }

    public function type(): string
    {
        return 'ballUp';
    }

    public function process(MatchState $match)
    {
        return [Hitout::class, $this->ruckContest($match)->teamPlayer()];
    }
}
