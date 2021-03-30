<?php

namespace spec\Phooty;

use Evenement\EventEmitter;
use Evenement\EventEmitterInterface;
use Phooty\Config;
use Phooty\Core\EventLoop;
use Phooty\Core\Timer;
use Phooty\Kernel;
use PhpSpec\ObjectBehavior;
use Pimple\Container;

class KernelSpec extends ObjectBehavior
{
    function let(
        Container $app,
        Config $config,
        EventEmitterInterface $emitter,
        EventLoop $eventLoop,
        Timer $timer
    ) {
        $app->offsetGet(EventLoop::class)->willReturn($eventLoop);
        $app->offsetGet(Timer::class)->willReturn($timer);
        $this->beConstructedWith($app, $config, $emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
