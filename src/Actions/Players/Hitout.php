<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Stoppage;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Hitout implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;

    protected $isStat = true;

    private array $targets = ['RO', 'C', 'RR'];

    public function type(): string
    {
        return 'hitout';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {
        if (mt_rand(0, 2) === 0) {
            // sharked hitout
            return [Clearance::class, $this->getOpponent(
                $this->targets[array_rand($this->targets)],
                $match
            )];
        }

        $target = $this->getTarget(
            $this->targets[array_rand($this->targets)],
            $match
        );

        switch (mt_rand(0, 2)) {
            case 0:
                return [Stoppage::class];
            default:
                return [Clearance::class, $target];
        }
    }
}
