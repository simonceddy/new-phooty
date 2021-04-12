<?php

namespace spec\Phooty\Entities\Attributes;

use Phooty\Entities\Attributes\PlayerRatings;
use PhpSpec\ObjectBehavior;

class PlayerRatingsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'speed' => 9.1,
            'kicking' => 7.3,
            'scoring' => 4.2
        ]);
    }
    

    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerRatings::class);
    }

    function it_contains_ratings_that_can_influence_rng()
    {
        $this->offsetGet('speed')->shouldBeFloat();
        $this->offsetGet('kicking')->shouldReturn(7.3);
    }
}
