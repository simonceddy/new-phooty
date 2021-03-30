<?php
namespace Phooty\Events;

use Phooty\Core\Timer;

class TickEvent
{
    public function __construct(private Timer $timer)
    {}

    public function __invoke(int $ms = 1)
    {
        $this->timer->tick($ms);
    }
}
