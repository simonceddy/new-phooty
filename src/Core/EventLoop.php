<?php
namespace Phooty\Core;

class EventLoop
{
    private bool $active = false;

    public function __construct(private Timer $timer)
    {

    }

    public function start()
    {
        $this->active = true;

        while ($this->active) {
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