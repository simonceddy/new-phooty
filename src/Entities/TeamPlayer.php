<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\TeamData;

class TeamPlayer
{
    public function __construct(
        private TeamData $team,
        private Player $player
    )
    {}
}
