<?php

namespace spec\Phooty;

use Evenement\EventEmitter;
use Phooty\Config;
use Phooty\Core\EventLoop;
use Phooty\Kernel;
use PhpSpec\ObjectBehavior;

class KernelSpec extends ObjectBehavior
{
    function let(EventEmitter $emitter, EventLoop $eventLoop, Config $config)
    {
        $this->beConstructedWith($emitter, $eventLoop, $config);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
