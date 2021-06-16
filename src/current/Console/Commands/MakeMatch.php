<?php
namespace Phooty\Console\Commands;

use Phooty\Support\Factories\MatchFactory;
use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Output\OutputInterface,
};

class MakeMatch extends Command
{
    public function __construct(private MatchFactory $factory)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('make:match');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return 0;
    }
}
