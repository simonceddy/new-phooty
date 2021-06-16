<?php
namespace Phooty\Support;

use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\TeamPlayer;
use Phooty\Entities\Player;

class AssignTeam
{
    public function __construct(private TeamData $team)
    {}

    public function to(array $players)
    {
        $teamPlayers = [];

        foreach ($players as $index => $player) {
            $teamPlayers[$index] = new TeamPlayer(
                $this->team,
                $player
            );
        }

        return $teamPlayers;
    }
}
