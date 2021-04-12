<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Handball implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected $isStat = true;

    public function type(): string
    {
        return 'handball';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {
        $this->gainFooty($match);
        
        $target = $this->getOwnTarget($match);

        return [Kick::class, $target];
    }
}
