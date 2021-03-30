<?php
namespace Phooty\Actions;

use Phooty\Entities\TeamPlayer;

interface PlayerAction extends Action
{
    public function player(): TeamPlayer;
}
