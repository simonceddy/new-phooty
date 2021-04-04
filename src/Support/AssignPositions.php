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
                $results[$pos] = array_pop($players)->assignPos(
                    new Position($pos)
                );
            }
        }

        return $results;
    }
}
