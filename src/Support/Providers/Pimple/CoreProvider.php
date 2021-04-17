<?php
namespace Phooty\Support\Providers\Pimple;

use Evenement\{
    EventEmitter,
    EventEmitterInterface
};
use Phooty\{
    Bootstrap\BootTimeKeeper,
    Config,
    Core\EventLoop,
    Core\TimeKeeper,
    Core\Timer,
    Kernel,
};
use Phooty\Data\Scoreboard;
use Phooty\Support\MatchUp;
use Phooty\Support\SetField;
use Pimple\{
    Container,
    ServiceProviderInterface
};
use Pimple\Psr11\Container as Psr11Container;

class CoreProvider implements ServiceProviderInterface
{
    private function registerEmitter(Container $app)
    {
        $app[EventEmitterInterface::class] = function () {
            return new EventEmitter();
        };

        $app[EventEmitter::class] = function (Container $c) {
            return $c[EventEmitterInterface::class];
        };
    }

    public function registerTimekeepers(Container $app)
    {
        $app[TimeKeeper::class] = function (Container $c) {
            // dd($c[Config::class]);
            return (new BootTimeKeeper())->boot($c[Config::class], $c[EventEmitter::class]);
        };

        $app[Timer::class] = function (Container $c) {
            return new Timer($c[TimeKeeper::class]);
        };
    }

    public function register(Container $app)
    {
        $this->registerEmitter($app);

        $this->registerTimekeepers($app);

        $app[EventLoop::class] = function (Container $c) {
            return new EventLoop($c[Timer::class]);
        };

        $app[Kernel::class] = function (Container $c) {
            return new Kernel(
                new Psr11Container($c),
                $c[Config::class],
                $c[EventEmitter::class]
            );
        };

        $app[MatchUp::class] = function (Container $c) {
            return new MatchUp($c[Config::class]['players.matchUps']);
        };

        $app[SetField::class] = function (Container $c) {
            return new SetField(
                $c[Config::class]['players.positions'],
                $c[MatchUp::class]
            );
        };

        $app[Scoreboard::class] = function () {
            return new Scoreboard();
        };
    }
}
