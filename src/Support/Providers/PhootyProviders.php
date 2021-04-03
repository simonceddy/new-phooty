<?php
namespace Phooty\Support\Providers;

use Pimple\{
    Container,
    ServiceProviderInterface
};

class PhootyProviders implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app->register(new CoreProvider());
        $app->register(new DevProvider());
        $app->register(new EngineProvider());
        $app->register(new ConsoleProvider());
    }
}
