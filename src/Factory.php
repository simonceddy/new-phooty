<?php
namespace Phooty;

use Evenement\EventEmitter;
use Phooty\Bootstrap\BootCore;
use Phooty\{
    Core\TimeKeeper,
    Core\Timer,
    Core\EventLoop,
    Support\ConfigFactory
};

class Factory
{
    /**
     * Create a new Phooty Kernel
     *
     * @return Kernel
     */
    public static function create()
    {
        $kernel = (new BootCore())->boot(
            (new ConfigFactory())->load(projectRoot() . '/config')
        );

        // $emitter = new EventEmitter();

        // $timer = new Timer(new TimeKeeper($emitter));

        // $kernel = new Kernel($emitter, new EventLoop($timer));

        return $kernel;
    }
}
