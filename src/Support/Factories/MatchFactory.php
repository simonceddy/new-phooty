<?php
namespace Phooty\Support\Factories;

use Phooty\{
    Geometry\FieldDimensions,
    MatchConfiguration,
    Support\Factory
};

class MatchFactory implements Factory
{
    public function __construct(
        private TeamFactory $teamFactory
    ) {}

    /**
     * Create the given amount of MatchConfiguration objects
     *
     * @param int $amount
     * @param array $attributes
     *
     * @return MatchConfiguration[]
     */
    public function make(int $amount = 1, array $attributes = [])
    {
        $matches = [];
        for ($i=0; $i < $amount; $i++) { 
            $w = $attributes['fieldWidth'] ?? 80;
            $l = $attributes['fieldLength'] ?? 110;
            $field = new FieldDimensions($w, $l);
    
            [$homeTeam, $awayTeam] = $this->teamFactory->make(2);
    
            $matches[] = new MatchConfiguration($homeTeam, $awayTeam, $field);
        }

        return $matches;
    }
}
