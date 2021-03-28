<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\TeamData;

class FootyTeam implements Team
{
    public function __construct(
        private TeamData $data,
        private array $players
    ) {}

    public function data()
    {
        return $this->data;
    }

    public function players()
    {
        return $this->players;
    }
}
