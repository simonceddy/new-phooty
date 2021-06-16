<?php
namespace Phooty\Plugins\RoboDennis;

use Symfony\Component\Console\Output\OutputInterface;

class Commentate
{
    public function __construct(
        private OutputInterface $output
    ) {}

    private function format(string $message)
    {
        return "Dennis: {$message}";
    }

    public function say(string $message)
    {
        $this->output->writeln($this->format($message));
    }
}
