<?php
namespace Phooty\Core\Engine\Players;

use Phooty\Entities\Footy;
use Phooty\Entities\Player;

class AwareOfFooty
{
    public function __construct(private Footy $footy)
    {}

    public function footy()
    {
        return $this->footy;
    }

    public function teamHasPossession(Player $player)
    {
        if ($this->footy->isLoose()) return false;

        return $player->team() === $this->footy()->heldBy()->team();
    }
}
