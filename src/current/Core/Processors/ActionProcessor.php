<?php
namespace Phooty\Core\Processors;

use Evenement\EventEmitterInterface;
use Phooty\Actions\Action;
use Phooty\MatchState;
use Phooty\Support\ActionConstructor;

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
        private Action $first,
        private ActionConstructor $actionConstructor,
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
        // dump('resetting');
        // $this->stop();
        $this->queue = [$this->first];
    }

    protected function runActionQueue(MatchState $match)
    {
        if (!empty($this->queue) && $this->queue[0] !== null) {

            $this->active = true;
            $action = array_shift($this->queue);
            $result = $action->process($match);
            $this->emitter->emit('action', [$action]);
            if (empty($result)) {
                $next = $this->first;
            } else {
                $className = array_shift($result);
                $next = $this->actionConstructor->make($className, $result);
            }

            array_unshift($this->queue, $next);

            if (($duration = $action->duration()) > 0) {
                $this->emitter->emit('tick', [$duration]);
            }
            if ($action->isStat()) {
                $match->data()->stats()->stat($action);
            }

        }

        return $match;
    }

    public function process(MatchState $match): MatchState
    {
        return $this->runActionQueue($match);
    }
}
