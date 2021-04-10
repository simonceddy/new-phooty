<?php
namespace Phooty\Console\Commands;

use Phooty\Support\Factories\TeamFactory;
use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Output\OutputInterface,
};

class MakeTeam extends Command
{
    public function __construct(private TeamFactory $factory)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('make:team');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return 0;
    }
}
