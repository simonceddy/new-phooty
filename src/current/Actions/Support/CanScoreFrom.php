<?php
namespace Phooty\Actions\Support;

use Phooty\Actions\Players;
use Phooty\Entities\Player;
use Phooty\Util\Ray;

trait CanScoreFrom
{
    protected array $actions = [
        Players\Goal::class,
        Players\Behind::class,
        // RushedBehind::class,
    ];

    protected array $canScore = [
        'RHF' => true,
        'CHF' => true,
        'LHF' => true,
        'FF' => true,
        'RFP' => true,
        'LFP' => true,
    ];

    /**
     * Can the player score from the action?
     *
     * @param Player $player
     *
     * @return bool
     */
    protected function withinRange(Player $player)
    {
        $pos = $player->position();

        if (!$pos) {
            return false;
        }

        return isset($this->canScore[(string) $pos])
            && $this->canScore[(string) $pos];
    }

    protected function attemptScore()
    {
        return Ray::randVal($this->actions);
    }
}
