<?php
namespace Phooty\Core\Engine\Players;

// use Phooty\Geometry\PlayingField;

class Awareness
{
    public function __construct(
        private AwareOfFooty $footy,
        private AwareOfSurroundings $surroundings,
    ) {}

    public function field()
    {
        return $this->surroundings->field();
    }

    public function footy()
    {
        return $this->footy->footy();
    }
}
