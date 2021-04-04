<?php
namespace Phooty\Actions\Players;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support;
use Phooty\MatchState;

class Kick implements Action, PlayerAction
{
    use Support\GenericAction;
    use Support\IsPlayerAction;
    use Support\CanScoreFrom;

    protected $isStat = true;

    public function type(): string
    {
        return 'kick';
    }
        
    public function duration(): int
    {
        return 500;
    }

    public function process(MatchState $match)
    {
        if ($this->withinRange($this->player)) {
            // handle scoring
            return [$this->attemptScore(), $this->player()];
        }

        $target = $this->getOwnTarget($match);

        return [MarkingContest::class, $target];
    }
}
