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
use Psr\Container\ContainerInterface as Container;

/**
 * The Phooty Kernel is responsible for setting up and running a phooty
 * simulation.
 */
class Kernel
{
    private array $plugins = [];

    /**
     * Create a new Kernel instance
     * 
     * @param Container $app Bootstrapped PSR11 container
     * @param Config $config Simulation configuration
     * @param EventEmitterInterface $emitter The EventEmitter instance
     */
    public function __construct(
        private Container $app,
        private Config $config,
        private EventEmitterInterface $emitter,
    ) {}

    private function bootstrapEventEmitter()
    {
        $this->emitter->on('period.end', new Events\EndPeriod());
        $this->emitter->on('loop.end', new Events\EndLoop($this->app->get(EventLoop::class)));
        $this->emitter->on('tick', new Events\TickEvent(
            $this->app->get(Timer::class)
        ));
        $this->emitter->on('action', new Events\ActionEvent(
            $this->app->get(Data\Scoreboard::class)
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

        if ($this->app->has($plugin)) {
            $this->plugins[$plugin] = $this->app->get($plugin);
        } else {
            $this->plugins[$plugin] = $this->app->get(ReflectionConstructor::class)
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
            $this->app->get(SetField::class)->prepare(
                $matchConfig->homeTeam(),
                $matchConfig->awayTeam(),
                (new InitPlayingField($this->emitter))->from($matchConfig)
            ),
            new MatchData(new Data\Stats(), $matchConfig),
            new Entities\Sherrin()
        );

        $this->app->get(EventLoop::class)->start(
            $match,
            new Processors\PlayProcessor([
                new Processors\ActionProcessor(
                    $this->emitter,
                    new Actions\CenterBounce(),
                    $this->app->get(ActionConstructor::class)
                )
            ])
        );

        $result = new MatchResult(
            $match->data(),
            $this->app->get(Data\Scoreboard::class)
        );

        // dd($matchConfig->homeTeam()->player('RO'));
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
