<?php
namespace Phooty\Bootstrap;

use Evenement\EventEmitterInterface;
use Phooty\{
    Core\TimeKeeper,
    Config
};

class BootEventLoop
{
    public function boot(
        Config $config,
        EventEmitterInterface $eventEmitter
    ) {
        return new TimeKeeper(
            $eventEmitter,
            $config->get('core.periodLength'),
            $config->get('core.totalPeriods')
        );
    }
}
