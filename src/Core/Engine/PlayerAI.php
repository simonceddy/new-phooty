<?php
namespace Phooty\Core\Engine;

use Phooty\Entities\Player;
use Phooty\MatchState;

class PlayerAI
{
    public function __construct(
        private Players\GetTarget $target,
    )
    {}

    public function __call($name, $arguments)
    {
        if (method_exists($this->target, $name)) {
            return call_user_func_array([$this->target, $name], $arguments);
        }

        throw new \BadMethodCallException();
    }

    public function getOwnTarget(Player $player, MatchState $match)
    {
        return $this->target->getTargetOf($player, $match);
    }
}
