<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class GroundBallGet implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected $isStat = true;

    public function type(): string
    {
        return 'groundBallGet';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {

    }
}
