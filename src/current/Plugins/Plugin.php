<?php
namespace Phooty\Plugins;

use Evenement\EventEmitterInterface;

interface Plugin
{
    public function register(EventEmitterInterface $emitter);
}
