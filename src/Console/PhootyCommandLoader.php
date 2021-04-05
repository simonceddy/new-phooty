<?php
namespace Phooty\Console;

use Pimple\Container;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;

class PhootyCommandLoader implements CommandLoaderInterface
{
    public function __construct(private Container $app)
    {
        
    }

    public function get(string $name)
    {
        
    }

    public function has(string $name)
    {
        
    }

    public function getNames()
    {
        
    }
}
