<?php
namespace Phooty\Events;

use Phooty\Core\EventLoop;

class EndLoop
{
    public function __construct(private EventLoop $eventLoop)
    {
        
    }

    public function __invoke()
    {
        $this->eventLoop->end();
            echo PHP_EOL . 'The loop ended' . PHP_EOL;
    }
}
