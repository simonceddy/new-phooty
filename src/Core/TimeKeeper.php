<?php
namespace Phooty\Core;

use Evenement\EventEmitter;

class TimeKeeper
{
    private int $period = 0;

    public function __construct(
        private EventEmitter $emitter,
        private int $periodLength = 12000,
        private int $totalPeriods = 4
    ) {
        
    }

    public function __invoke(Timer $timer)
    {
        if ($timer->now() >= $this->periodLength) {
            $this->period++;
            $this->emitter->emit('end.period', [$this->period, $timer]);
        }

        if ($this->period >= $this->totalPeriods) {
            $this->emitter->emit('end.loop');
        }
    }
}
