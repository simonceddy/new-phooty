<?php
namespace Phooty;

use Phooty\Processors\Processor;

class PlayProcessor implements Processor
{
    /**
     * Create PlayProcessor instance
     * 
     * @param Processor[] $processors
     */
    public function __construct(private array $processors = [])
    {
        
    }

    public function process(MatchState $match): MatchState
    {
        foreach ($this->processors as $processor) {
            $match = $processor->process($match);
        }
        return $match;
    }

    public function __invoke(MatchState $match): MatchState
    {
        return $this->process($match);
    }
}
