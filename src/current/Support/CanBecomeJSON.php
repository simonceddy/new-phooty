<?php
namespace Phooty\Support;

trait CanBecomeJSON
{
    abstract public function toArray();

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
