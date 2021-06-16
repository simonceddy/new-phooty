<?php
namespace Phooty\Support\Providers\Pimple;

use Phooty\{
    Config,
    Support\CSVData,
    Support\FootyFaker,
    Support\ReflectionConstructor
};
use Phooty\Support\Factories\{
    MatchFactory,
    PlayerFactory,
    TeamFactory
};
use Pimple\{
    Container,
    ServiceProviderInterface
};
use Pimple\Psr11\Container as Psr11Container;

class DevProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[ReflectionConstructor::class] = function (Container $c) {
            return new ReflectionConstructor(new Psr11Container($c));
        };

        $app[CSVData::class] = function () {
            return new CSVData();
        };

        $app[FootyFaker::class] = function (Container $c) {
            return new FootyFaker($c[CSVData::class]);
        };

        $app[PlayerFactory::class] = function (Container $c) {
            return new PlayerFactory($c[FootyFaker::class]);
        };
        
        $app[TeamFactory::class] = function (Container $c) {
            return new TeamFactory(
                $c[FootyFaker::class],
                $c[PlayerFactory::class],
                $c[Config::class]['players.positions']
            );
        };

        $app[MatchFactory::class] = function (Container $c) {
            return new MatchFactory(
                $c[TeamFactory::class]
            );
        };
    }
}
