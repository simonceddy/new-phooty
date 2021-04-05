<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\Position;
use PhpSpec\ObjectBehavior;

class PositionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('RU');
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
