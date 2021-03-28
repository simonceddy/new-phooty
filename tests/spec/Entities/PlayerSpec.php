<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\Attributes\PlayerData;
use Phooty\Entities\Player;
use PhpSpec\ObjectBehavior;

class PlayerSpec extends ObjectBehavior
{
    function let(PlayerData $data)
    {
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_has_player_data()
    {
        $this->data()->shouldBeAnInstanceOf(PlayerData::class);
    }
}
