<?php
namespace Phooty\Support;

use Phooty\Entities\Position;

class AssignPositions
{
    public function __construct(private array $positions)
    {
        
    }

    public function to(array $players)
    {
        $results = [];
        foreach($this->positions as $positions) {
            foreach ($positions as $pos => $handler) {
                $player = array_pop($players);
                $player->assignPos(new Position($pos));
                $results[$pos] = $player;
            }
        }

        return $results;
    }
}
