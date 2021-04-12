<?php
namespace Phooty\Core\Engine\Players;

use Phooty\Geometry\PlayingField;

class AwareOfSurroundings
{
    public function __construct(private PlayingField $field)
    {}

    public function field()
    {
        return $this->field;
    }
}
