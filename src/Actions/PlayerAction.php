<?php
namespace Phooty\Actions;

use Phooty\Entities\Player;

interface PlayerAction extends Action
{
    public function player(): Player;
}
