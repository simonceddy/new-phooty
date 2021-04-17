<?php
namespace Phooty\Support\Providers\Pimple;

use Phooty\Core\Engine\Players\GetTarget;
use Phooty\Config;
use Phooty\Core\Engine\PlayerAI;
use Phooty\Core\Engine\Players\Awareness;
use Phooty\Core\Engine\Players\AwareOfFooty;
use Phooty\Core\Engine\Players\AwareOfSurroundings;
use Phooty\Entities\Footy;
use Phooty\Entities\Sherrin;
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

        $app[Footy::class] = function () {
            return new Sherrin();
        };

        $app[AwareOfFooty::class] = function (Container $c) {
            return new AwareOfFooty($c[Footy::class]);
        };

        $app[AwareOfSurroundings::class] = function () {
            return new AwareOfSurroundings();
        };

        $app[Awareness::class] = function (Container $c) {
            return new Awareness(
                $c[AwareOfFooty::class],
                $c[AwareOfSurroundings::class]
            );
        };

        $app[PlayerAI::class] = function (Container $c) {
            return new PlayerAI(
                $c[GetTarget::class],
                $c[Awareness::class]
            );
        };
    }
}
