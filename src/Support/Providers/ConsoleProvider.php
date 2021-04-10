<?php
namespace Phooty\Support\Providers;

use Phooty\{
    Config,
    Kernel
};
use Phooty\Console\{
    PhootyCommandLoader,
    Commands
};
use Phooty\Support\Factories;
use Phooty\Support\ReflectionConstructor;
use Pimple\{
    Container,
    ServiceProviderInterface
};
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleProvider implements ServiceProviderInterface
{
    private function registerCommands(Container $app)
    {
        $commands = $app[Config::class]['console.commands'];

        foreach ($commands as $className) {
            $app[$className] = fn(
                Container $c
            ) => $c[ReflectionConstructor::class]->create($className);
        }
    }

    public function register(Container $app)
    {
        $this->registerCommands($app);

        $app[PhootyCommandLoader::class] = function (Container $c) {
            return new PhootyCommandLoader(
                $c,
                $c[Config::class]['console.commands']
            );
        };

        $app[OutputInterface::class] = fn() => new ConsoleOutput();

        $app[Application::class] = function (Container $c) {
            $cli = new Application(
                $c[Config::class]['app.name'],
                $c[Config::class]['app.version']
            );

            $cli->setCommandLoader($c[PhootyCommandLoader::class]);

            return $cli;
        };
    }
}
