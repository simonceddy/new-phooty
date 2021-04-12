<?php
namespace Phooty\Support\Providers;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use Phooty\Bootstrap\BootstrapPhootyDir;
use Phooty\Config;
use Phooty\Support\ConfigFactory;
use Phooty\Support\PhootyDir;
use Pimple\{
    Container,
    ServiceProviderInterface
};

class PhootyProviders implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[PhootyDir::class] = function () {
            return (new BootstrapPhootyDir())->init(new PhootyDir());
        };

        $app[Cache::class] = function (Container $c) {
            return new FilesystemCache($c[PhootyDir::class] . '/cache');
        };

        $app[Config::class] = function (Container $c) {
            if ($c[Cache::class]->contains('config')) {
                return $c[Cache::class]->fetch('config');
            }
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
