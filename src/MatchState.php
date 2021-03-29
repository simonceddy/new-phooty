<?php
namespace Phooty;

use Phooty\Geometry\PlayingField;
use Phooty\Entities\Team;
use Phooty\Geometry\FieldDimensions;

/**
 * The MatchState object contains the current state of the simulation.
 * 
 * @method Team homeTeam()
 * @method Team awayTeam()
 * @method FieldDimensions dimensions()
 */
class MatchState
{
    public function __construct(
        private MatchConfiguration $matchConfig,
        private PlayingField $field,
    ) {}

    public function field()
    {
        return $this->field;
    }

    public function matchConfig()
    {
        return $this->matchConfig;
    }

    public function __call(string $name, array $args)
    {
        if (method_exists($this->matchConfig, $name)) {
            return call_user_func_array([$this->matchConfig, $name], $args);
        }
    }
}
