<?php

namespace spec\Phooty;

use Evenement\EventEmitterInterface;
use Phooty\Config;
use Phooty\Core\EventLoop;
use Phooty\Kernel;
use PhpSpec\ObjectBehavior;
use Pimple\Container;

class KernelSpec extends ObjectBehavior
{
    function let(Container $app, Config $config, EventEmitterInterface $emitter)
    {
        $this->beConstructedWith($app, $config, $emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
