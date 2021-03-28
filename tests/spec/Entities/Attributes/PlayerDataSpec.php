<?php

namespace spec\Phooty\Entities\Attributes;

use Phooty\Entities\Attributes\PlayerData;
use PhpSpec\ObjectBehavior;

class PlayerDataSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(12, 'Jimmy', 'Bonkers');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerData::class);
    }

    function it_has_a_number()
    {
        $this->getNumber()->shouldReturn(12);
    }

    function it_has_names()
    {
        $this->getGivenName()->shouldReturn('Jimmy');
        $this->getSurname()->shouldReturn('Bonkers');
    }
}
