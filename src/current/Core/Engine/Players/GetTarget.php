<?php
namespace Phooty\Core\Engine\Players;

use Phooty\Entities\Player;
use Phooty\Entities\Position;
use Phooty\MatchState;

class GetTarget
{
    private array $likelyTargets = [
        'RU' => ['LW', 'RW', 'C', 'RO', 'RR', 'CHF', 'LHF', 'RHF'],
        'RR' => ['LW', 'RW', 'C', 'RU', 'RO', 'CHF', 'LHF', 'RHF'],
        'RO' => ['LW', 'RW', 'C', 'RU', 'RR', 'CHF', 'LHF', 'RHF'],
    ];

    private array $positions;

    private array $keys;

    public function __construct(array $positions)
    {
        $this->positions = ($keys = array_keys($positions));
        $this->keys = array_combine($keys, array_keys($this->positions));
    }

    private function getAdjacent(int $key)
    {
        $targets = array_filter(
            $this->positions,
            fn($id) => $id === $key - 1
                || $id === $key + 1
                || $id === $key + 2
                || $id === $key + 3
                || $id === $key + 4,
            ARRAY_FILTER_USE_KEY
        );

        return $targets;
    }

    private function getTargetByPos(string $type)
    {
        return $this->getAdjacent($this->keys[$type]);
    }

    public function getAdjacentTo(Position $pos)
    {
        if (!isset($this->likelyTargets[$posType = $pos->type()])) {
            $this->likelyTargets[$posType] = $this->getTargetByPos($posType);
        }

        return $this->likelyTargets[$posType][
            array_rand($this->likelyTargets[$posType])
        ];
    }

    public function getTargetOf(Player $player, MatchState $match)
    {
        $pos = $player->position();

        if (!$pos) {
            throw new \LogicException('No position located');
        }

        $targetPos = $this->getAdjacentTo($pos);

        $teamData = $player->team();
        $target = $match->team($teamData)->player($targetPos);

        return $target;
    }
}
