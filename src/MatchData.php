<?php
namespace Phooty;

use Phooty\Data\Stats;

class MatchData
{
    public function __construct(
        private Stats $stats,
        private MatchConfiguration $config
    ) {}

    /**
     * Get the stats object
     */ 
    public function stats()
    {
        return $this->stats;
    }

    public function config()
    {
        return $this->config;
    }
}
