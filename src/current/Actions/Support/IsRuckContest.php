<?php
namespace Phooty\Actions\Support;

use Phooty\MatchState;

trait IsRuckContest
{
    protected function ruckContest(MatchState $match)
    {
        $hRuck = $match->homeTeam()->player('RU');
        $aRuck = $match->awayTeam()->player('RU');

        return mt_rand(0, 1) === 1 ? $hRuck : $aRuck;
    }
}
