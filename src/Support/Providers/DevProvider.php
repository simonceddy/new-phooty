<?php
namespace Phooty\Support\Providers;

use Phooty\{
    Config,
    Support\CSVData,
    Support\FootyFaker,
    Support\PlayerFactory,
    Support\TeamFactory
};
use Pimple\{
    Container,
    ServiceProviderInterface
};

class DevProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
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
    }
}
