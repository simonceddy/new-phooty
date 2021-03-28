<?php
namespace Phooty\Core;

use Phooty\MatchConfiguration;

class EventLoop
{
    private bool $active = false;

    public function __construct(private Timer $timer)
    {

    }

    public function start(
        MatchConfiguration $match,
        callable $onTick = null
    ) {
        $this->active = true;

        while ($this->active) {
            if (isset($onTick)) {
                call_user_func($onTick, $match);
            }
            $this->timer->tick(mt_rand(0, 100));
        }
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