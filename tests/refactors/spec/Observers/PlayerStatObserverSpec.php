<?php

namespace spec\RePhooty\Observers;

use PhpSpec\ObjectBehavior;
use RePhooty\Observers\PlayerStatObserver;

class PlayerStatObserverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerStatObserver::class);
    }
}
