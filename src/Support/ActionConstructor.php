<?php
namespace Phooty\Support;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Actions\Support\GetTarget;
use Pimple\Container;

class ActionConstructor
{
    public function __construct(private Container $app)
    {
        
    }

    public function make(string $className, array $args = [])
    {
        $contracts = class_implements($className);

        if (!isset($contracts[Action::class])) {
            throw new \Exception('Invalid Action class!');
        }

        if (isset($contracts[PlayerAction::class])
            && (!isset($args[0]) || !($args[0] instanceof GetTarget))
        ) {
            // dump($args[0] instanceof GetTarget);
            array_unshift($args, $this->app[GetTarget::class]);
        }
        // dump($args);

        return new $className(...$args);
    }
}
