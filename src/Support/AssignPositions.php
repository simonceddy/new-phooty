<?php
namespace Phooty\Support;

use Phooty\Entities\Position;

class AssignPositions
{
    public function __construct(private array $positions)
    {
        
    }

    public function assignTo(array $players)
    {
        $results = [];
        foreach($this->positions as $positions) {
            foreach ($positions as $pos => $handler) {
                $results[$pos] = new Position($pos, array_pop($players));
            }
        }

        return $results;
    }
}
