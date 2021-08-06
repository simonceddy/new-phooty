<?php

namespace spec\Phooty\Core;

use Phooty\Core\Timer;
use PhpSpec\ObjectBehavior;

class TimerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Timer::class);
    }

    function it_increments_a_counter()
    {
        $this->tick(30);
        $this->now()->shouldReturn(30);
    }

    function it_can_be_reset()
    {
        $this->tick(30);
        $this->now()->shouldReturn(30);
        $this->reset();
        $this->now()->shouldReturn(0);
    }
}
