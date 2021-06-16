<?php
namespace Phooty\Console;

use Pimple\Container;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;
use Symfony\Component\Console\Exception\CommandNotFoundException;

class PhootyCommandLoader implements CommandLoaderInterface
{
    public function __construct(
        private Container $app, 
        private array $commands
    ) {}

    public function get(string $name)
    {
        if (!$this->has($name)
            || !isset($this->app[$this->commands[$name]])
        ) {
            throw new CommandNotFoundException('Unknown command!');
        }

        return $this->app[$this->commands[$name]];
    }

    public function has(string $name)
    {
        return isset($this->commands[$name]);
    }

    public function getNames()
    {
        return array_keys($this->commands);
    }
}
