<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\TeamData;

interface Team
{
    /**
     * Returns an array of Position(Player) objects assigned to the team.
     *
     * @return Player[]
     */
    public function players();

    public function player(string $pos): Player;

    public function data(): TeamData;
}
