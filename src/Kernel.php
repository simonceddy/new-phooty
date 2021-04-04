<?php
namespace Phooty;

use Evenement\EventEmitterInterface;
use Phooty\Actions\CenterBounce;
use Phooty\Core\EventLoop;
use Phooty\Core\Timer;
use Phooty\Data\Scoreboard;
use Phooty\Data\Stats;
use Phooty\Processors\ActionProcessor;
use Phooty\Support\ActionConstructor;
use Phooty\Support\InitPlayingField;
use Phooty\Support\SetField;
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
            $this->app[Scoreboard::class]
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
            new MatchData(new Stats())
        );

        $this->app[EventLoop::class]->start(
            $match,
            new PlayProcessor([
                new ActionProcessor(
                    $this->emitter,
                    new CenterBounce(),
                    $this->app[ActionConstructor::class]
                )
            ])
        );
        return new MatchResult($match->data(), $this->app[Scoreboard::class]);
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
