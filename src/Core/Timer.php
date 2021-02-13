<?php
namespace Phooty\Core;

class Timer
{
    private $onTick;

    private int $current = 0;

    public function __construct(callable $onTick = null)
    {
        $onTick === null ?: $this->onTick = $onTick;
    }

    public function tick(int $amount = 1)
    {
        $this->current += $amount;

        !isset($this->onTick) ?: call_user_func($this->onTick, $this);

        // dd($this);
    }

    public function reset()
    {
        $this->current = 0;
    }

    /**
     * Get the value of current
     */ 
    public function now()
    {
        return $this->current;
    }
}
