<?php
namespace Phooty;

use Evenement\EventEmitterInterface;
use Phooty\Core\{
    EventLoop,
    Timer,
    Processors,
    Events
};
use Phooty\Plugins\Plugin;
use Phooty\Support\{
    ActionConstructor,
    InitPlayingField,
    ReflectionConstructor,
    SetField
};
use Pimple\Container;

class Kernel
{
    private array $plugins = [];

    public function __construct(
        private Container $app,
        private Config $config,
        private EventEmitterInterface $emitter,
    ) {}

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
     * Register a Plugin with the eventemitter
     *
     * @param string $plugin
     *
     * @return void
     */
    private function registerPlugin(string $plugin)
    {
        if (!isset(class_implements($plugin)[Plugin::class])) {
            throw new Exceptions\IllegalPluginException(
                'Illegal plugin type!'
            );
        }

        if (isset($this->app[$plugin])) {
            $this->plugins[$plugin] = $this->app[$plugin];
        } else {
            $this->plugins[$plugin] = $this->app[ReflectionConstructor::class]
                ->create($plugin);
        }

        $this->plugins[$plugin]->register($this->emitter);
    }

    private function bootstrapPlugins()
    {
        $plugins = $this->config['app.plugins'];

        if (is_array($plugins) && !empty($plugins)) {
            foreach ($plugins as $plugin) {
                $this->registerPlugin($plugin);
            }
        }
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
        $this->bootstrapPlugins();

        $this->bootstrapEventEmitter();

        $match = new MatchState(
            $matchConfig,
            $this->app[SetField::class]->prepare(
                $matchConfig->homeTeam(),
                $matchConfig->awayTeam(),
                (new InitPlayingField($this->emitter))->from($matchConfig)
            ),
            new MatchData(new Data\Stats(), $matchConfig),
            new Entities\Sherrin()
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

        $result = new MatchResult(
            $match->data(),
            $this->app[Data\Scoreboard::class]
        );

        // dd($result);
        return $result;
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
