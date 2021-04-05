<?php
namespace Phooty;

use Evenement\EventEmitterInterface;
use Phooty\Core\{
    EventLoop,
    Timer,
    Processors,
    Events
};
use Phooty\Support\{
    ActionConstructor,
    InitPlayingField,
    SetField
};
use Pimple\Container;

class Kernel
{
    public function __construct(
        private Container $app,
        private Config $config,
        private EventEmitterInterface $emitter,
    ) {
        $this->bootstrapEventEmitter();
    }

    private function bootstrapEventEmitter()
    {
        $this->emitter->on('period.end', new Events\EndPeriod());
        $this->emitter->on('loop.end', new Events\EndLoop($this->app[EventLoop::class]));
        $this->emitter->on('tick', new Events\TickEvent(
            $this->app[Timer::class]
        ));
        $this->emitter->on('action', new Events\ActionEvent(
            $this->app[Data\Scoreboard::class]
        ));
    }

    /**
     * Simulate a match from the given config
     *
     * @param MatchConfiguration $matchConfig
     *
     * @return MatchResult
     */
    public function run(MatchConfiguration $matchConfig)
    {
        $match = new MatchState(
            $matchConfig,
            $this->app[SetField::class]->prepare(
                $matchConfig->homeTeam(),
                $matchConfig->awayTeam(),
                (new InitPlayingField($this->emitter))->from($matchConfig)
            ),
            new MatchData(new Data\Stats())
        );

        $this->app[EventLoop::class]->start(
            $match,
            new Processors\PlayProcessor([
                new Processors\ActionProcessor(
                    $this->emitter,
                    new Actions\CenterBounce(),
                    $this->app[ActionConstructor::class]
                )
            ])
        );
        return new MatchResult(
            $match->data(),
            $this->app[Data\Scoreboard::class]
        );
    }

    /**
     * Returns the Config object
     *
     * @return Config
     */
    public function config()
    {
        return $this->config;
    }
}
