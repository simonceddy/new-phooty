<?php
namespace Phooty\Data;

use Phooty\Entities\TeamPlayer;

class Statline
{
    private array $stats = [];

    public function __construct(private TeamPlayer $player)
    {}

    /**
     * Get the TeamPlayer object
     */ 
    public function player()
    {
        return $this->player;
    }

    public function addStat(string $type, int $amount = 1)
    {
        if (!isset($this->stats[$type])) {
            $this->stats[$type] = $amount;
        } else {
            $this->stats[$type] += $amount;
        }
    }
}
