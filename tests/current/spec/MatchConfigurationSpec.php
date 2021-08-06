<?php

namespace spec\Phooty;

use Phooty\Entities\Attributes\TeamData;
use Phooty\Entities\Team;
use Phooty\Geometry\FieldDimensions;
use Phooty\MatchConfiguration;
use PhpSpec\ObjectBehavior;

class MatchConfigurationSpec extends ObjectBehavior
{
    function let(
        Team $team,
        TeamData $teamData
    ) {
        $team->data()->willReturn($teamData);
        $this->beConstructedWith($team, $team, new FieldDimensions(12, 12));
    }
    

    function it_is_initializable()
    {
        $this->shouldHaveType(MatchConfiguration::class);
    }

    function it_contains_the_home_team()
    {
        $this->homeTeam()->shouldBeAnInstanceOf(Team::class);
    }

    function it_contains_the_away_team()
    {
        $this->awayTeam()->shouldBeAnInstanceOf(Team::class);
    }

    function it_contains_the_field_dimensions()
    {
        $this->dimensions()->shouldBeAnInstanceOf(FieldDimensions::class);
    }
}
