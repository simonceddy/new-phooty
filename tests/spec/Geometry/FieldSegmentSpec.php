<?php

namespace spec\Phooty\Geometry;

use Phooty\Entities\Player;
use Phooty\Geometry\FieldSegment;
use PhpSpec\ObjectBehavior;

class FieldSegmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FieldSegment::class);
    }

    function it_can_contain_entities(Player $player1, Player $player2)
    {
        $this->beConstructedWith([$player1, $player2]);
        $this->entities()->shouldReturn([$player1, $player2]);
    }
}
