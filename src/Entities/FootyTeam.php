<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\TeamData;

class FootyTeam implements Team
{
    public function __construct(
        private TeamData $data,
        private array $players
    ) {}

    public function data(): TeamData
    {
        return $this->data;
    }

    public function players()
    {
        return $this->players;
    }

    public function player(string $pos): Position
    {
        if (!isset($this->players[$pos])) {
            throw new \InvalidArgumentException("Invalid position: {$pos}");
        }

        return $this->players[$pos];
    }
}
