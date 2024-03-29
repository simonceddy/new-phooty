<?php
namespace Phooty\Core\Processors;

use Phooty\MatchState;

interface Processor
{
    public function process(MatchState $match): MatchState;
}
