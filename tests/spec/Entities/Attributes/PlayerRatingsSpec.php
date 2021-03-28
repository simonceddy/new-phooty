<?php

namespace spec\Phooty\Entities\Attributes;

use Phooty\Entities\Attributes\PlayerRatings;
use PhpSpec\ObjectBehavior;

class PlayerRatingsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerRatings::class);
    }
}
