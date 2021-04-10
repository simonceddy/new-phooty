<?php
namespace Phooty\Actions;

use Phooty\Entities\Player;

interface PlayerAction extends Action
{
    public function player(): Player;

    /**
     * Returns the player opponent. Must return false if no opponent is set.
     *
     * @return Player|false
     */
    public function opponent();
}
