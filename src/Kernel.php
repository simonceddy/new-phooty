<?php
namespace Phooty;

use Evenement\EventEmitter;
use Phooty\Core\EventLoop;
use Phooty\Geometry\PlayingField;
use Phooty\Support\InitPlayingField;
use Phooty\Support\SetField;
use Pimple\Container;

class Kernel
{
    public function __construct(
        private Container $app,
        private Config $config,
        private EventEmitter $emitter,
    ) {
        $this->bootstrapEventEmitter();
    }

    private function bootstrapEventEmitter()
    {
        $this->emitter->on('period.end', new Events\EndPeriod());
        $this->emitter->on('loop.end', new Events\EndLoop($this->app[EventLoop::class]));
    }

    public function run(MatchConfiguration $matchConfig)
    {
        $match = new MatchState(
            $matchConfig,
            $this->app[SetField::class]->prepare(
                $matchConfig->homeTeam(),
                $matchConfig->awayTeam(),
                (new InitPlayingField($this->emitter))->from($matchConfig)
            )
        );

        $this->app[EventLoop::class]->start(
            $match,
            new PlayProcessor()
        );
        return new MatchResult();
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
