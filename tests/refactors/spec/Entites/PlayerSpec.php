<?php

namespace spec\RePhooty\Entites;

use PhpSpec\ObjectBehavior;
use RePhooty\Entites\Player;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }
}
