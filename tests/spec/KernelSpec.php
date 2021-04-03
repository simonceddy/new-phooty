<?php

namespace spec\Phooty;

use Evenement\EventEmitter;
use Evenement\EventEmitterInterface;
use Phooty\Config;
use Phooty\Core\EventLoop;
use Phooty\Core\Timer;
use Phooty\Kernel;
use Phooty\MatchConfiguration;
use Phooty\MatchResult;
use Phooty\Support\SetField;
use PhpSpec\ObjectBehavior;
use Pimple\Container;

class KernelSpec extends ObjectBehavior
{
    function let(
        Container $app,
        Config $config,
        EventEmitterInterface $emitter,
        EventLoop $eventLoop,
        Timer $timer,
        SetField $setField,
    ) {
        $app->offsetGet(EventLoop::class)->willReturn($eventLoop);
        $app->offsetGet(Timer::class)->willReturn($timer);
        $app->offsetGet(SetField::class)->willReturn($setField);

        $this->beConstructedWith($app, $config, $emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }

    function it_runs_the_simulation(MatchConfiguration $matchConfiguration)
    {
        $this->run($matchConfiguration)->shouldBeAnInstanceOf(MatchResult::class);
    }
}
