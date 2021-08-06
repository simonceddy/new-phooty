<?php

namespace spec\Phooty\Geometry;

use Evenement\EventEmitterInterface;
use Phooty\Geometry\FieldDimensions;
use Phooty\Geometry\FieldSegment;
use Phooty\Geometry\PlayingField;
use PhpSpec\ObjectBehavior;

class PlayingFieldSpec extends ObjectBehavior
{
    function let(EventEmitterInterface $emitter)
    {
        $this->beConstructedWith(new FieldDimensions(80, 120), $emitter);
    }
    

    function it_is_initializable()
    {
        $this->shouldHaveType(PlayingField::class);
    }

    function it_has_width_and_length()
    {
        $this->width()->shouldBeInt();
        $this->length()->shouldBeInt();
    }

    function it_has_field_segments()
    {
        $this->at(12, 15)->shouldBeAnInstanceOf(FieldSegment::class);
    }
}
