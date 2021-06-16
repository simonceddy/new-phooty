<?php
namespace Phooty\Support;

use Evenement\EventEmitterInterface;
use Phooty\Geometry\PlayingField;
use Phooty\MatchConfiguration;

class InitPlayingField
{
    public function __construct(private EventEmitterInterface $emitter)
    {
        
    }

    public function from(MatchConfiguration $config)
    {
        return new PlayingField($config->dimensions(), $this->emitter);
    }
}
