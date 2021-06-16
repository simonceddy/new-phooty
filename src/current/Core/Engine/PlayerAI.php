<?php
namespace Phooty\Core\Engine;

use Phooty\Entities\Player;
use Phooty\Entities\Footy;
use Phooty\MatchState;

/**
 * The PlayerAI class
 * 
 * @method Players\AwareOfSurroundings surrounds()
 * @method Footy footy()
 */
class PlayerAI
{
    public function __construct(
        private Players\GetTarget $target,
        private Players\Awareness $awareness
    )
    {}

    public function __call($name, $arguments)
    {
        if (method_exists($this->target, $name)) {
            return call_user_func_array([$this->target, $name], $arguments);
        }

        if (method_exists($this->awareness, $name)) {
            return call_user_func_array([$this->awareness, $name], $arguments);
        }

        throw new \BadMethodCallException();
    }

    public function getOwnTarget(Player $player, MatchState $match)
    {
        return $this->target->getTargetOf($player, $match);
    }
}
