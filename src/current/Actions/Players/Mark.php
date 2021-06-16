<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Mark implements PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected $isStat = true;

    public function type(): string
    {
        return 'mark';
    }

    public function duration(): int
    {
        return 200;
    }

    public function process(MatchState $match)
    {
        $this->gainFooty($match);
        return [Kick::class, $this->player];
    }
}
