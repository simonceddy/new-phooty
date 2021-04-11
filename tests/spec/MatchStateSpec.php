<?php
namespace spec\Phooty;

use Phooty\Geometry\PlayingField;
use Phooty\MatchConfiguration;
use Phooty\MatchData;
use Phooty\MatchState;
use PhpSpec\ObjectBehavior;

class MatchStateSpec extends ObjectBehavior
{
    function let(MatchConfiguration $conf, PlayingField $field, MatchData $data)
    {
        $this->beConstructedWith($conf, $field, $data);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(MatchState::class);
    }
}
