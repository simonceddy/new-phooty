<?php
namespace Phooty\Actions\Support;

use Phooty\MatchState;

trait GenericAction
{
    abstract public function process(MatchState $match);

    public function duration(): int
    {
        return $this->duration ?? 0;
    }

    public function type()
    {
        return $this->type ?? '';
    }

    public function isStat(): bool
    {
        return $this->isStat ?? false;
    }
}
