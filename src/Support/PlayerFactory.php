<?php
namespace Phooty\Support;

use Phooty\Entities\{
    Attributes\PlayerData,
    Player
};

class PlayerFactory
{
    public function __construct(
        private FootyFaker $faker,
        private AssignPositions $assignPos
    ) {
        
    }

    public function make(
        int $amount = 22,
        array $attributes = [],
        array $options = []
    ) {
        $players = [];

        $numbers = new PlayerNumberGen();

        for ($i=1; $i <= $amount; $i++) {
            $players[$i] = new Player(new PlayerData(
                $attributes['number'] ?? $numbers->get(),
                $attributes['surname'] ?? $this->faker->surname(),
                $attributes['firstName'] ?? $this->faker->firstName()
            ));
        }
        
        return $options['assignPositions'] ? $this->assignPos->assignTo(
            $players
        ) : $players;
    }
}
