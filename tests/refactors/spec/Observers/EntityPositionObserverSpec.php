<?php

namespace spec\RePhooty\Observers;

use PhpSpec\ObjectBehavior;
use RePhooty\Observers\EntityPositionObserver;

class EntityPositionObserverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EntityPositionObserver::class);
    }
}
