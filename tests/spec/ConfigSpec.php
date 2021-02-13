<?php

namespace spec\Phooty;

use Phooty\Config;
use Phooty\Support\ConfigFactory;
use PhpSpec\ObjectBehavior;

class ConfigSpec extends ObjectBehavior
{
    function let(ConfigFactory $configFactory)
    {
        $this->beConstructedThrough([$configFactory, 'load']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Config::class);
    }
}
