<?php
namespace Phooty;

use Phooty\Data\Scoreboard;

class MatchResult
{
    public function __construct(
        private MatchData $data,
        private Scoreboard $scoreboard
    ) {
        
    }

    /**
     * Get the scoreboard
     */ 
    public function score()
    {
        return $this->scoreboard;
    }
}
