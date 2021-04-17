<?php
namespace Phooty\Data;

use Ds\Map;
use Phooty\Actions\PlayerAction;
use Phooty\Support\CanBecomeJSON;

// use Phooty\MatchConfiguration;

class Stats implements \JsonSerializable
{
    use CanBecomeJSON;

    protected Map $statlines;

    public function __construct()
    {
        $this->statlines = new Map();
    }

    private function compareStat(string $type, $a, $b)
    {
        return $a[$type] <=> $b[$type];
    }

    public function sortBy(string $type)
    {
        $this->statlines->sort(
            fn($a, $b) => $this->compareStat($type, $a, $b)
        );

        return $this;
    }

    public function stat(PlayerAction $action)
    {
        $player = $action->player();
        // dd($player);
        if (!isset($this->statlines[$player])) {
            $this->statlines[$player] = new Statline($player);
        }

        $this->statlines[$player]->addStat($action->type());
    }

    public function toArray()
    {
        $array = [];

        foreach ($this->statlines as $player => $stats) {
            $array[$player->name(true)] = [
                'data' => $player->toArray(),
                'stats' => $stats->toArray()
            ];
        }

        return $array;
    }
}
