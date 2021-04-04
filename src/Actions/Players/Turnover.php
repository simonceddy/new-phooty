<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Turnover implements PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected $isStat = true;

    public function type(): string
    {
        return 'turnover';
    }

    public function duration(): int
    {
        return 0;
    }

    public function process(MatchState $match)
    {
        return [Kick::class, $this->getOwnTarget($match)];
    }
}
