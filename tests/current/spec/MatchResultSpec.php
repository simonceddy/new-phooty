<?php

namespace spec\Phooty;

use Phooty\Data\Scoreboard;
use Phooty\MatchData;
use Phooty\MatchResult;
use PhpSpec\ObjectBehavior;

class MatchResultSpec extends ObjectBehavior
{
    function let(MatchData $data, Scoreboard $scoreboard)
    {
        $this->beConstructedWith($data, $scoreboard);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(MatchResult::class);
    }
}
