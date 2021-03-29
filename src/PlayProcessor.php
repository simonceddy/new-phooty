<?php
namespace Phooty;

class PlayProcessor
{
    public function __construct(private array $processors = [])
    {
        
    }

    public function __invoke(MatchState $match)
    {
        return $match;
    }
}
