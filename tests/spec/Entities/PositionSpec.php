<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\TeamPlayer;
use Phooty\Entities\Position;
use PhpSpec\ObjectBehavior;

class PositionSpec extends ObjectBehavior
{
    function let(TeamPlayer $player)
    {
        $this->beConstructedWith('RU', $player);
    }
    

    function it_is_initializable()
    {
        $this->shouldHaveType(Position::class);
    }

    function it_has_a_type()
    {
        $this->type()->shouldReturn('RU');
    }
}
