<?php
namespace Phooty\Data;

use Ds\Map;
use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\Player;

class Scoreboard
{
    private Map $scores;

    public function __construct()
    {
        $this->scores = new Map();
    }

    protected function scoreFor(
        TeamData $team,
        int $goals = 0,
        int $behinds = 0
    ) {
        if (!isset($this->scores[$team])) {
            $this->scores[$team] = [
                'goals' => $goals,
                'behinds' => $behinds
            ];
        } else {
            $goals === 0 ?: $this->scores[$team]['goals'] += $goals;
            $behinds === 0 ?: $this->scores[$team]['behinds'] += $behinds;
        }
    }

    protected function sumScores(array $scores)
    {
        return $scores['goals'] * 6 + $scores['behinds'];
    }

    public function goal(Player $player)
    {
        return $this->scoreFor($player->team(), 1);
    }

    public function behind(Player $player)
    {
        return $this->scoreFor($player->team(), 0, 1);
    }

    public function totals()
    {
        $totals = [];
        foreach ($this->scores as $team => $scores) {
            // dd($team);
            $totals[(string) $team] = implode('.', [
                $scores['goals'],
                $scores['behinds'],
                $this->sumScores($scores)
            ]);
        }

        return $totals;
    }
}
