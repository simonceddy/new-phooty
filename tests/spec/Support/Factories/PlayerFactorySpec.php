<?php

namespace spec\Phooty\Support\Factories;

use Phooty\Entities\Attributes\PlayerData;
use Phooty\Entities\Player;
use Phooty\Support\Factories\PlayerFactory;
use Phooty\Support\FootyFaker;
use PhpSpec\ObjectBehavior;

class PlayerFactorySpec extends ObjectBehavior
{
    function let(FootyFaker $faker)
    {
        $faker->surname()->willReturn('douglims');
        $faker->firstName()->willReturn('gorgus');
        $this->beConstructedWith($faker);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerFactory::class);
    }

    function it_creates_an_array_of_player_data_objects()
    {
        $this->make()[0]->shouldBeAnInstanceOf(PlayerData::class);
    }

    function it_creates_the_given_amount_of_player_data_objects()
    {
        $this->make(12)->shouldHaveCount(12);
    }
}
