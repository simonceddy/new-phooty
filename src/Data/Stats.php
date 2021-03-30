<?php
namespace Phooty\Data;

use Ds\Map;
use Phooty\Actions\PlayerAction;
use Phooty\MatchConfiguration;

class Stats
{
    protected Map $statlines;

    public function __construct()
    {
        $this->statlines = new Map();
    }

    public function stat(PlayerAction $action)
    {
        $player = $action->player();
        if (!isset($this->statlines[$team = $player->team()])) {
            $this->statlines[$team] = new Map();
        }
        if (!isset($this->statlines[$team][$player])) {
            $this->statlines[$team][$player] = new Statline($player);
        }

        $this->statlines[$team][$player]->addStat($action->type());
    }
}
