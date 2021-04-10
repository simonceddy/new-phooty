<?php
namespace Phooty\Plugins\RoboDennis;

use Pimple\{
    Container,
    ServiceProviderInterface
};
use Symfony\Component\Console\Output\OutputInterface;

class RoboDennisProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[Commentate::class] = function (Container $c) {
            return new Commentate($c[OutputInterface::class]);
        };
    }
}

