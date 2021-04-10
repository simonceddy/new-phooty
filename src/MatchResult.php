<?php
namespace Phooty;

use Phooty\Data\Scoreboard;
use Phooty\Support\CanBecomeJSON;

class MatchResult implements \JsonSerializable
{
    use CanBecomeJSON;

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

    /**
     * Get the matchdata object
     */ 
    public function data()
    {
        return $this->data;
    }

    public function toArray()
    {
        return [
            'scores' => $this->scoreboard->toArray(),
            'stats' => $this->data->stats()->toArray()
        ];
    }
}
