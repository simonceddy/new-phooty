<?php
namespace Phooty\Support\Factories;

use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\FootyTeam;
use Phooty\Support\AssignPositions;
use Phooty\Support\AssignTeam;
use Phooty\Support\FootyFaker;
use Phooty\Util\Tex;

class TeamFactory
{
    public function __construct(
        private FootyFaker $faker,
        private PlayerFactory $playerFactory,
        private array $positions
    ) {}

    public function make(int $amount = 1, array $attributes = [])
    {
        $teams = [];

        for ($i=1; $i <= $amount; $i++) {
            $teamData = new TeamData(
                $attributes['city'] ?? $this->faker->city(),
                $attributes['name'] ?? Tex::pluralize(
                    $this->faker->teamName()
                )
            );

            $players = (new AssignPositions($this->positions))->to(
                (new AssignTeam($teamData))->to(
                    $this->playerFactory->make(18)
                )
            );
            $teams[] = new FootyTeam($teamData, $players);
        }
        return $teams;
    }
}
