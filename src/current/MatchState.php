<?php
namespace Phooty;

use Phooty\Entities\{
    Attributes\TeamData,
    Footy,
    Team
};
use Phooty\Geometry\{PlayingField, FieldDimensions};

/**
 * The MatchState object contains the current state of the simulation.
 * 
 * @method Team homeTeam()
 * @method Team awayTeam()
 * @method FieldDimensions dimensions()
 * @method Team team(TeamData $data)
 * @method Team opposition(TeamData $data)
 */
class MatchState
{
    public function __construct(
        private MatchConfiguration $config,
        private PlayingField $field,
        private MatchData $data,
        private Footy $footy
    ) {}

    public function field()
    {
        return $this->field;
    }

    public function matchConfig()
    {
        return $this->config;
    }

    public function __call(string $name, array $args)
    {
        if (method_exists($this->config, $name)) {
            return call_user_func_array([$this->config, $name], $args);
        }
        if (method_exists($this->data, $name)) {
            return call_user_func_array([$this->data, $name], $args);
        }
    }

    /**
     * Get the MatchData object
     */ 
    public function data()
    {
        return $this->data;
    }

    /**
     * Get the footy object
     * 
     * @return Footy
     */ 
    public function footy()
    {
        return $this->footy;
    }
}
