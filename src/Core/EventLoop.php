<?php
namespace Phooty\Core;

use Phooty\MatchState;

class EventLoop
{
    private bool $active = false;

    public function __construct(private Timer $timer)
    {}

    public function start(
        MatchState $match,
        callable $onTick = null
    ) {
        $this->active = true;

        while ($this->active) {
            if (isset($onTick)) {
                call_user_func($onTick, $match, $this->timer);
            }
            $this->timer->tick(mt_rand(0, 100));
        }

        return $match;
    }

    public function end()
    {
        $this->active = false;
    }

    /**
     * @return Timer
     */ 
    public function timer()
    {
        return $this->timer;
    }
}