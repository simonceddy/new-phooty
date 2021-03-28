<?php
namespace Phooty\Support\Providers;

use Phooty\Support\CSVData;
use Phooty\Support\FootyFaker;
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
    }
}
