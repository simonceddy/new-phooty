<?php

namespace spec\Phooty\Core;

use Evenement\EventEmitter;
use Phooty\Core\TimeKeeper;
use PhpSpec\ObjectBehavior;

class TimeKeeperSpec extends ObjectBehavior
{
    function let(EventEmitter $emitter)
    {
        $this->beConstructedWith($emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TimeKeeper::class);
    }
}
