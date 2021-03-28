<?php
namespace Phooty;

use Evenement\EventEmitter;
use Phooty\Core\EventLoop;

class Kernel
{
    public function __construct(
        private EventEmitter $emitter,
        private EventLoop $eventLoop,
        private Config $config
    ) {
        $this->bootstrapEventEmitter();
    }

    private function bootstrapEventEmitter()
    {
        $this->emitter->on('end.period', new Events\EndPeriod());
        $this->emitter->on('end.loop', new Events\EndLoop($this->eventLoop));
    }

    public function run(MatchConfiguration $match)
    {
        $this->eventLoop->start($match);
    }

    public function config()
    {
        return $this->config;
    }
}
