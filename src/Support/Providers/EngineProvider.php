<?php
namespace Phooty\Support\Providers;

use Phooty\Actions\Support\GetTarget;
use Phooty\Config;
use Phooty\Support\ActionConstructor;
use Phooty\Util\Ray;
use Pimple\{
    Container,
    ServiceProviderInterface
};

class EngineProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[ActionConstructor::class] = function (Container $c) {
            return new ActionConstructor($c);
        };

        $app[GetTarget::class] = function (Container $c) {
            return new GetTarget(
                Ray::flatten($c[Config::class]['players.positions'])
            );
        };
    }
}
