<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\Player;
use PhpSpec\ObjectBehavior;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_belongs_to_a_team()
    {
        $this->team()->shouldReturn(true);
    }
}
