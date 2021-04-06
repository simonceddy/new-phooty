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
use Phooty\Support\Factories\MatchFactory;
use Pimple\{
    Container,
    ServiceProviderInterface
};
use Symfony\Component\Console\Application;

class ConsoleProvider implements ServiceProviderInterface
{
    private function registerCommands(Container $app)
    {
        $app[Commands\RunCommand::class] = function (Container $c) {
            return new Commands\RunCommand(
                $c[Kernel::class], 
                $c[MatchFactory::class]
            );
        };
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
