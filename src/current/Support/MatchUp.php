<?php
namespace Phooty\Support;

class MatchUp
{
    public function __construct(private array $matchUps)
    {
    }

    public function resolve(string $pos)
    {
        return $this->matchUps[$pos] ?? false;
    }
}
