<?php
namespace Phooty\Support\Providers;

use Phooty\Config;
use Pimple\{
    Container,
    ServiceProviderInterface
};
use Symfony\Component\Console\Application;

class ConsoleProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[Application::class] = function (Container $c) {
            return new Application(
                $c[Config::class]['app.name'],
                $c[Config::class]['app.version']
            );
        };
    }
}
