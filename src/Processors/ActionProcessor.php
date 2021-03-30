<?php
namespace Phooty\Processors;

use Evenement\EventEmitterInterface;
use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\MatchState;

class ActionProcessor implements Processor
{
    /**
     * Action queue
     * 
     * @var Action[]
     */
    private array $queue = [];

    private bool $active = false;

    public function __construct(
        private EventEmitterInterface $emitter,
        private Action $first
    ) {
        $this->queue[] = $this->first;

        $this->emitter->on('period.end', fn() => $this->reset());
        $this->emitter->on('loop.end', fn() => $this->stop());
    }

    public function stop()
    {
        $this->active = false;
    }

    public function reset()
    {
        $this->queue = [$this->first];
    }

    protected function runActionQueue(MatchState $match)
    {
        if (!empty($this->queue) && $this->queue[0] !== null) {

            $action = array_shift($this->queue);
            $this->emitter->emit('action', [$action]);
            $next = $action->process($match);

            if (($duration = $action->duration()) > 0) {
                $this->emitter->emit('tick', [$duration]);
            }
            if ($action instanceof PlayerAction) {
                $match->data()->stats()->stat($action);
            }
            array_unshift($this->queue, $next);
        }

        return $match;
    }

    public function process(MatchState $match): MatchState
    {
        return $this->runActionQueue($match);
    }
}
