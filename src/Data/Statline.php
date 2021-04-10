<?php
namespace Phooty\Data;

use Phooty\Entities\TeamPlayer;
use Phooty\Support\CanBecomeJSON;

class Statline implements \ArrayAccess, \JsonSerializable
{
    use CanBecomeJSON;

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

    public function offsetExists($type)
    {
        return isset($this->stats[$type]);
    }

    public function offsetGet($type)
    {
        return $this->stats[$type] ?? 0;
    }

    public function offsetSet($type, $amount)
    {
        $this->addStat($type, $amount);
    }

    public function offsetUnset($type)
    {}

    public function toArray()
    {
        return $this->stats;
    }
}
