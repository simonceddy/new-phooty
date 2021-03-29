<?php
namespace Phooty\Actions;

use Phooty\MatchState;

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

    public function process(MatchState $match);

    public function type(): string;
}
