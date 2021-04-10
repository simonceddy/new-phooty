<?php
namespace Phooty\Support\Providers;

use Phooty\Config;
use Phooty\Support\ConfigFactory;
use Pimple\{
    Container,
    ServiceProviderInterface
};

class PhootyProviders implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[Config::class] = function () {
            return (new ConfigFactory())->load([
                projectRoot() . '/config'
            ]);
        };

        $app->register(new CoreProvider());
        $app->register(new DevProvider());
        $app->register(new EngineProvider());
        $app->register(new ConsoleProvider());

        $providers = $app[Config::class]['app.providers'];

        if (isset($providers)) {
            foreach ($providers as $provider) {
                try {
                    (new $provider())->register($app);
                } catch (\Throwable $e) {
                    throw $e;
                }
            }
        }
    }
}
