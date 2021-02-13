<?php
namespace Phooty\Events;

use Phooty\Core\Timer;

class EndPeriod
{
    public function __invoke(int $period, Timer $timer)
    {
        echo PHP_EOL . "Period {$period} has ended" . PHP_EOL;
        $timer->reset();
    }
}
