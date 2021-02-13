<?php
namespace Phooty\Bootstrap;

use Evenement\EventEmitter;
use Phooty\{
    Config,
    Kernel,
    Support\ConfigFactory,
};
use Phooty\Core\EventLoop;
use Phooty\Core\Timer;

class BootCore
{
    public function boot(Config $config = null)
    {
        isset($config) ?: $config = (new ConfigFactory())->load();
        $eventEmitter = new EventEmitter();
        $timeKeeper = (new BootTimeKeeper())->boot($config, $eventEmitter);
        return new Kernel(
            $eventEmitter,
            new EventLoop(new Timer($timeKeeper)),
            $config
        );
        // dd($config->get('core'), $timeKeeper);
    }
}
