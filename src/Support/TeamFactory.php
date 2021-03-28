<?php
namespace Phooty\Support;

use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\FootyTeam;
use Phooty\Util\Text;

class TeamFactory
{
    public function __construct(
        private FootyFaker $faker,
        private PlayerFactory $playerFactory
    ) {}

    public function make(int $amount = 1, array $attributes = [])
    {
        $teams = [];

        for ($i=1; $i <= $amount; $i++) {
            $teams[] = new FootyTeam(
                new TeamData(
                    $attributes['city'] ?? $this->faker->city(),
                    $attributes['name'] ?? Text::pluralize(
                        $this->faker->teamName()
                    )
                ),
                $this->playerFactory->make(22, [], [
                    'assignPositions' => true
                ])
            );
        }
        return $teams;
    }
}
