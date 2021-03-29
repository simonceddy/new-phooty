<?php
namespace Phooty\Entities;

interface Team
{
    /**
     * Returns an array of Position(Player) objects assigned to the team.
     *
     * @return Position[]
     */
    public function players();

    public function player(string $pos): Position;
}
