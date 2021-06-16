<?php
namespace Phooty\Console\Commands;

use Phooty\Support\Factories\PlayerFactory;
use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Output\OutputInterface,
};

class MakePlayer extends Command
{
    public function __construct(private PlayerFactory $factory)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('make:player')
            ->setDescription('Create and persist a new player.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $player = $this->factory->make(1);
        dump(json_encode($player, JSON_PRETTY_PRINT));
        return 0;
    }
}
