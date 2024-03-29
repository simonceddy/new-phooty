<?php
namespace Phooty\Actions;

use Phooty\Actions\Players\Hitout;
use Phooty\MatchState;

class CenterBounce implements Action
{
    use Support\GenericAction;
    use Support\IsRuckContest;

    public function duration(): int
    {
        return 1000;
    }

    public function process(MatchState $match)
    {
        return [Hitout::class, $this->ruckContest($match)];
        // return new Hitout($this->ruckContest($match)->teamPlayer());
    }

    public function type(): string
    {
        return 'centerBounce';
    }
}
