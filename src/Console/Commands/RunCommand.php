<?php
namespace Phooty\Console\Commands;

use Phooty\Kernel;
use Phooty\Support\Factories\MatchFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command
{
    public function __construct(
        private Kernel $kernel,
        private MatchFactory $matchFactory
    ) {
        parent::__construct();
    }
    
    protected function configure()
    {
        $this->setName('run')
            ->setDescription('Simulate a randomly generated Phooty match.')
            ->setHelp('Simulate a phooty match using random teams and players, and the default field size.')
            ->addOption(
                'saveResults',
                'S',
                InputOption::VALUE_NONE,
                'Persist the match data to storage'
            )
            // ->addOption('')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Running match sim');
        // dd(get_class($output));
        [$match] = $this->matchFactory->make();

        $results = $this->kernel->run($match);
        $scores = $results->score()->totals();
        foreach ($scores as $team => $score) {
            $output->writeln($team . ': ' . $score);
        }

        // dump(json_encode($results, JSON_PRETTY_PRINT));
        // dump($results->data()->stats()->sortBy('hitout')->toArray());
        return 0;
    }
}
