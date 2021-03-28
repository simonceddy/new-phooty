<?php
namespace Phooty\Actions;

interface Action
{
    /**
     * Returns the duration of the action in milliseconds.
     *
     * The number returned must not be negative. It can, however, be 0.
     * 
     * @return int
     */
    public function duration(): int;
}
