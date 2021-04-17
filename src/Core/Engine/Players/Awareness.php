<?php
namespace Phooty\Core\Engine\Players;

// use Phooty\Geometry\PlayingField;

class Awareness
{
    public function __construct(
        private AwareOfFooty $footy,
        private AwareOfSurroundings $surroundings,
    ) {}

    public function surrounds()
    {
        return $this->surroundings;
    }

    public function footy()
    {
        return $this->footy->footy();
    }
}
