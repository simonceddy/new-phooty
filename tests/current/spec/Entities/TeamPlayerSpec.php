<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\Attributes\PlayerData;
use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\TeamPlayer;
use PhpSpec\ObjectBehavior;

class TeamPlayerSpec extends ObjectBehavior
{
    function let(TeamData $team, PlayerData $data)
    {
        $this->beConstructedWith($team, $data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TeamPlayer::class);
    }

    function it_has_player_data()
    {
        $this->data()->shouldBeAnInstanceOf(PlayerData::class);
    }
}
