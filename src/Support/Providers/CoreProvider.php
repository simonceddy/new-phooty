<?php
namespace Phooty\Support\Providers;

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
    Support\ConfigFactory,
};
use Pimple\{
    Container,
    ServiceProviderInterface
};

class CoreProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[Config::class] = function () {
            return (new ConfigFactory())->load([
                projectRoot() . '/config'
            ]);
        };

        $app[EventEmitterInterface::class] = function () {
            return new EventEmitter();
        };

        $app[EventEmitter::class] = function (Container $c) {
            return $c[EventEmitterInterface::class];
        };

        $app[TimeKeeper::class] = function (Container $c) {
            // dd($c[Config::class]);
            return (new BootTimeKeeper())->boot($c[Config::class], $c[EventEmitter::class]);
        };

        $app[Timer::class] = function (Container $c) {
            return new Timer($c[TimeKeeper::class]);
        };

        $app[EventLoop::class] = function (Container $c) {
            return new EventLoop($c[Timer::class]);
        };

        $app[Kernel::class] = function (Container $c) {
            return new Kernel(
                $c[EventEmitter::class],
                $c[EventLoop::class],
                $c[Config::class]
            );
        };
    }
}
